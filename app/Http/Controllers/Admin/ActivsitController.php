<?php

namespace App\Http\Controllers\Admin;

use App\Activist;
use App\Activists_initiative;
use App\City;
use App\Governorate;
use App\Http\Requests\ActivistRequest;
use App\Initiative;
use App\Initiative_evaluation;
use App\Interest;
use App\User;
use App\Imports\ActivistExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;
use Session;

class ActivsitController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);


        if (count($keywords) == 3) {
            $keywords[3] = "";
        }
        if (count($keywords) == 2) {
            $keywords[2] = "";
            $keywords[3] = "";
        }
        if (count($keywords) == 1) {
            $keywords[1] = "";
            $keywords[2] = "";
            $keywords[3] = "";
        }

        $items = Activist::leftJoin('users', 'user_id', 'users.id')->leftJoin('cities', 'city_id', 'cities.id')->whereRaw(true);


        if ($q)
            $items->whereRaw("(
            (users.name like ? and users.father_name like ? and users.grand_father_name like ? and users.last_name like ?) 
            or (users.name like ? and users.last_name like ? and users.grand_father_name like ? and users.father_name like ?) 
            or (users.name like ? and users.grand_father_name like ? and users.last_name like ? and users.father_name like ?) 
            or (users.father_name like ? and users.grand_father_name like ? and users.name like ? and users.last_name like ?) 
            or (users.father_name like ? and users.last_name like ? and users.grand_father_name like ? and users.name like ?) 
            or (users.grand_father_name like ? and users.last_name like ? and users.father_name like ? and users.name like ?) 
            or users.name like ? or  users.father_name like? or users.grand_father_name like?  or  users.last_name like?
            
            or users.email like ? or activists.mobile like ? or activists.ido like ?)"
                , ["%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$q%", "%$q%", "%$q%", "%$q%"

                    , "%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }

        if ($gender)
            $items->where('activists.gender', '=', $gender);


        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }


        if ($usefull) {
            if ($usefull == 1) {
                $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                $items->whereIn("activists.id"
                    , $activistsids);
            } else if ($usefull == 2) {
                $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                $items->whereNotIn("activists.id"
                    , $activistsids);
            }
        }
        if ($initiative_id) {
            $activistsids = Initiative::find($initiative_id)->activists_initiatives->pluck('initiative_id');
            $items->whereIn("id"
                , $activistsids);
        }


        if ($request['theaction'] == 'excel') {
            $items = Activist::whereIn('activists.id', $items->pluck('activists.id'))
                ->leftJoin('users', 'user_id', 'users.id')
                ->leftJoin('cities', 'city_id', 'cities.id')
                ->leftJoin('governorates', 'cities.governorate_id', 'governorates.id')
                ->select('activists.id as activistsid', 'users.name as usersname', 'users.father_name', 'users.grand_father_name', 'users.last_name',
                    'activists.ido', 'governorates.name as governoratesname', 'cities.name as citiesname', 'activists.neighborhood', 'activists.mobile')->get();

            return Excel::download(new ActivistExport($items), "activist.xlsx");
        } else {

            $items = Activist::whereIn('id', $items->pluck('activists.id'))->orderBy('activists.id', 'desc')->paginate(20)
                ->appends([
                    "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                    , "gender" => $gender, 'usefull' => $usefull
                    , 'interests_ids' => $interests_ids,
                    'initiative_id' => $initiative_id]);
            $cities = City::all();
            $governorates = Governorate::all();
            $initiatives = Initiative::all();
            $interests = Interest::where('status', '1')->get();
            return view('admin.activsits.index', compact('items', 'interests', 'initiatives', 'governorate_id', 'governorates', 'cities', 'city_id'));
        }

    }

    public function create()
    {
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('admin.activsits.create', compact('governorates', 'cities', 'interests'));
    }

    public function store(ActivistRequest $request)
    {
        $testeroor = $this->validate($request, [

            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|max:50',
            'shared' => 'required|max:2',
            'shared_ditalis' => 'max:1000',

        ]);
        $user_id = User::create([
            'name' => request()->name,
            'user_name' => request()->user_name,
            'father_name' => request()->father_name,
            'grand_father_name' => request()->grand_father_name,
            'last_name' => request()->last_name,
            'email' => request()->email,
            'the_type' => 2,
            'password' => bcrypt(request()->password),
        ])->id;
        request()['user_id'] = $user_id;


        $activist_id = Activist::create(request()->all())->id;

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

            for ($i = 0; $i < count($all_interests); $i++) {
                DB::table('activists_interests')->insertGetId([
                    'activist_id' => $activist_id,
                    'interest_id' => $all_interests[$i],
                ]);
            }
        } else {
            if ($request["other_interests"]) {
                $all_interests = $other_interests_ids;
                for ($i = 0; $i < count($all_interests); $i++) {
                    DB::table('activists_interests')->insertGetId([
                        'activist_id' => $activist_id,
                        'interest_id' => $all_interests[$i],
                    ]);
                }
            }
        }
        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/admin/activsit/create");
    }

    public function show($id)
    {
        $item = Activist::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }

        $hisinterests = $item->interests->all();
        $hisinitiative = $item->initiatives()->where('accept', 1)->paginate(20);
        return view('admin.activsits.show', compact('hisinterests', 'hisinitiative', 'item'));

    }

    public function edit($id)
    {
        $item = Activist::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }
        $cities = City::all();
        $governorates = Governorate::all();
        $hisinterests = $item->interests()->pluck('interests.id')->toArray();
        $interests = Interest::where('status', '1')->get();
        $thehisinterests = $item->interests()->get();
        $interests = $thehisinterests->merge($interests);
        return view('admin.activsits.edit', compact('cities', 'governorates', 'hisinterests', 'interests', 'item'));
    }

    public function update(ActivistRequest $request, $id)
    {
        $item = Activist::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }

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
        return redirect("/admin/activsit");
    }

    public function destroy($id)
    {
        //
    }

    public function initiaveToActivsit($id)
    {
        //
    }

    public function demandToActivsit($id)
    {
        //
    }

    public function evaluteToActivsit($id, Request $request)
    {
        $initiative_id = $request["initiative_id"] ?? "";
        $status = $request["status"] ?? "";

        $item = Activist::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }
        $items = $item->initiative_evaluations()->whereRaw(true);


        if ($initiative_id) {
            $items->whereRaw("(initiative_id = ?)"
                , [$initiative_id]);
        }
        if ($status || $status === '0') {
            if ($status == 1)
                $items->whereHas('admin');
            else
                $items->whereHas('activist');
        }
        $admin = auth()->user()->admin;
        if (!$admin->super_admin == 1) {
            $initiatives = $admin->initiatives->all();
        } else {
            $initiatives = Initiative::all();
        }

        $items = Initiative_evaluation::whereIn('id', $items->pluck('initiative_evaluation.id'))->paginate(20)
            ->appends(['initiative_id' => $initiative_id, 'status' => $status]);

        return view('admin.activsits.evaluteToActivsit', compact('items', 'item', 'initiatives'));

    }

    public function delete($id)
    {
        $item = Activist::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/admin/activsit");
        }

        $activistinterests = DB::table('activists_interests')->whereIn('activist_id', [$item->id])->pluck('id');
        if (count($activistinterests) > 0)
            DB::table('activists_interests')->whereIn('id', $activistinterests)->delete();

        $activistinitiatives = DB::table('activists_initiatives')->whereIn('activist_id', [$item->id])->pluck('id');
        if (count($activistinitiatives) > 0)
            DB::table('activists_initiatives')->whereIn('id', $activistinitiatives)->delete();

        $theuser = $item->user;
        $item->delete();
        $theuser->delete();
        Session::flash("msg", "تم حذف حساب بنجاح");
        return redirect("/admin/activsit");
    }
}
