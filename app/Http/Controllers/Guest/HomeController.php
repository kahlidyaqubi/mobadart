<?php

namespace App\Http\Controllers\Guest;

use App\Activist;
use App\City;
use App\Governorate;
use App\Http\Requests\ActivistRequest;
use App\Interest;
use Illuminate\Http\Request;
use DB;
use Session;
use App\User;

class HomeController extends BaseController
{
    
    public function mainPage()
    {
        return view('guest.mainPage');
    }
    public function register()
    {
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('guest.register', compact('governorates', 'cities', 'interests'));
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
        return redirect("/register");
    }

        
}