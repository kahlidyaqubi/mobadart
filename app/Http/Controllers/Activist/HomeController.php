<?php

namespace App\Http\Controllers\Activist;

use App\City;
use App\Governorate;
use App\Http\Requests\ActivistRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Initiative;
use App\Interest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Session;
use App\Activist;
use DB;

class HomeController extends BaseController
{

    public function changePassword()
    {
        return view("activist.home.changePassword");
    }
    public function changePassword_post(ChangePasswordRequest $request)
    {
        $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->old_password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->password = bcrypt($request["password"]);
            $user->save();

            Session::flash("msg", "s:تم تغيير كلمة المرور بنجاح");
        } else {
            Session::flash("msg", "e: كلمة المرور الحالية غير صحيحة");
        }
        return redirect('/activist/changePassword');
    }

    public function show()
    {
        $item = auth()->user()->activist;

        $hisinterests = $item->interests->all();
        $hisinitiative = $item->initiatives()->where('accept', 1)->paginate(20);
        return view("activist.home.dashboard",compact('hisinterests', 'hisinitiative', 'item'));
    }

    public function noaccess()
    {
        return redirect('/no_accsess');
    }

    public function editProfile()
    {
        $item = auth()->user()->activist;
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/activsit");
        }
        $cities = City::all();
        $governorates = Governorate::all();
        $hisinterests = $item->interests()->pluck('interests.id')->toArray();
        $interests = Interest::where('status', '1')->get();
        $thehisinterests = $item->interests()->get();
        $interests = $thehisinterests->merge($interests);
        return view('activist.home.editProfile', compact('cities', 'governorates', 'hisinterests', 'interests', 'item'));
    }

    public function editProfile_post(ActivistRequest $request)
    {

        $item = $item = auth()->user()->activist;
        $id = auth()->user()->activist->id;
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/activsit");
        }
        $the_id=$item->user->id;
        $testeroor = $this->validate($request, [
            'user_name' => Rule::unique('users')->where(function ($query) use ($the_id) {
                return $query->where('user_name', request()->user_name)->where('id', '!=', $the_id)
                    ;
            }),
            'email' => Rule::unique('users')->where(function ($query) use ($the_id) {
                return $query->where('email', request()->email)->where('id', '!=', $the_id)
                    ;
            }),

        ]);

        $user = User::find($item->user_id);

        $user->name = $request["name"];
        $user->father_name = $request["father_name"];
        $user->grand_father_name = $request["grand_father_name"];
        $user->last_name = $request["last_name"];
        $user->email = $request["email"];
        $user->user_name = $request["user_name"];
        $user->save();

        $item->update($request->all());


        if ($request["other_interests"]) {
            $other_interests = explode(",", $request["other_interests"]);
            $other_interests_ids = [];

            for ($i = 0; $i < count($other_interests); $i++) {
                if (!Interest::where('name', $other_interests[$i])->first()) {
                    $interest_id = Interest::create([
                        'name' => "$other_interests[$i]",
                        'status' => "2"
                    ])->id;

                } else {
                    $interest_id = Interest::where('name', $other_interests[$i])->first()->id;
                }
                $other_interests_ids[$i] = $interest_id;
            }
        }

        if (request()['interest']) {
            if ($request["other_interests"])
                $all_interests = array_merge($other_interests_ids, request()['interest']);
            else
                $all_interests = request()['interest'];
            \DB::table("activists_interests")->where("activist_id", $id)->delete();

            if ($all_interests) {
                foreach ($all_interests as $interest)
                    \DB::table("activists_interests")->insert([
                        "activist_id" => $id,
                        "interest_id" => $interest]);
            }
        } else {
            if ($request["other_interests"]) {
                $all_interests = $other_interests_ids;
                \DB::table("activists_interests")->where("activist_id", $id)->delete();
                if ($all_interests) {
                    foreach ($all_interests as $interest)
                        \DB::table("activists_interests")->insert([
                            "activist_id" => $id,
                            "interest_id" => $interest]);
                }
            }
        }

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/activist/editProfile");
    }

    public function hisDemand()
    {
        return redirect('/no_accsess');
    }

    public function hisInitiave(Request $request)
    {

        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $item=auth()->user()->activist;
        $items_ids=$item->activists_initiatives()->where('accept',1)->pluck('initiative_id')->toArray();
        $items =Initiative::whereIn('initiatives.id',$items_ids)->whereRaw('initiatives.paid_up >= initiatives.donation')
            ->leftJoin('admins', 'admin_id', 'admins.id')
            ->leftJoin('users', 'user_id', 'users.id')
            ->leftJoin('cities', 'city_id', 'cities.id')
            ->whereRaw(true);


        if ($q)
            $items->whereRaw("(initiatives.title like ? or initiatives.team_name like ? or users.name like ?)"
                , ["%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }



        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }

        if (($end_date) && ($start_date)) {
            $items = $items->whereRaw("end_date <= ? and start_date >= ?", [$end_date, $start_date]);
        } else {
            if ($start_date)
                $items = $items->whereRaw("start_date = ?", [$start_date]);

            if ($end_date)
                $items = $items->whereRaw("end_date = ?", [$end_date]);
        }
        if ($in_date)
            $items = $items->whereRaw("end_date >= ? and start_date <= ?", [$in_date, $in_date]);

        $items = Initiative::whereIn('initiatives.id', $items->pluck('initiatives.id'))->orderBy("initiatives.id", "desc")->paginate(20)
            ->appends([
                "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                , "in_date" => $in_date, 'end_date' => $end_date
                , 'interests_ids' => $interests_ids,
                'start_date' => $start_date]);
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('activist.initiatives.index', compact('items','item', 'interests', 'governorate_id', 'governorates', 'cities', 'city_id'));

    }


}