<?php

namespace App\Http\Controllers\Activist;

use App\City;
use App\Governorate;
use App\Http\Requests\ActivistRequest;
use App\Interest;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\Activist;
use DB;

class HomeController extends BaseController
{

    public function changePassword()
    {

    }

    public function show()
    {
        return view("activist.home.dashboard");
    }

    public function noaccess()
    {
        return "no access";
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
                    ->where('the_type', 2);
            }),
            'email' => Rule::unique('users')->where(function ($query) use ($the_id) {
                return $query->where('email', request()->email)->where('id', '!=', $the_id)
                    ->where('the_type', 2);
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

    }

    public function hisInitiave()
    {

    }


}