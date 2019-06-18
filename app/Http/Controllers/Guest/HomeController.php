<?php

namespace App\Http\Controllers\Guest;

use App\Activist;
use App\City;
use App\Governorate;
use App\Http\Requests\ActivistRequest;
use App\Initiative;
use App\Interest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use Session;
use App\User;
use App\Admin;
use App\Action;
use Notification;
use App\Notifications\NotifyUsers;

class HomeController extends BaseController
{
    
    public function mainPage()
    {
        $items=DB::table('initiatives')->whereRaw('initiatives.paid_up >= initiatives.donation')->get();
        $initiatives=collect();
        foreach ($items as $initiative){
            $initiatives->put("".date('m-d-Y', strtotime($initiative->start_date))."", "<a href='/initiative/".$initiative->id." ' >".$initiative->title."</a>");
        }


        $initiatives=json_encode($initiatives);

        return view('guest.mainPage',compact('initiatives'));
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
            'user_name' => Rule::unique('users')->where(function ($query)  {
                return $query->where('user_name', request()->user_name)
                    ->where('the_type', 2);
            }),
            'email' => Rule::unique('users')->where(function ($query)  {
                return $query->where('email', request()->email)
                    ->where('the_type', 2);
            }),

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


        /**************start Notification*******************/
        /*use App\User;
        use App\Admin;
        use App\Action;
        use DB;
        use Notification;
        use App\Notifications\NotifyUsers;*/

        $action = Action::create(['title' => 'قام ناشط بانشاء حساب جديد', 'type' => 'من ناشط', 'link' => '/admin/activsit/']);
        $suber_admins_ids = User::whereIn('id', Admin::where('super_admin', 1)->pluck('user_id'))->pluck('id')->toArray();

        $have_prmission = User::whereIn('id', Admin::whereIn('id', DB::table('admins_links')->leftJoin("links", "link_id", "links.id")->where('links.title', 'إدارة الحسابات')->pluck('admin_id'))->pluck('user_id'))->pluck('id')->toArray();

        $users_ids = array_merge($suber_admins_ids, $have_prmission);

        $users = User::whereIn('id', $users_ids)->get();

        if($users->first())
        Notification::send($users, new NotifyUsers($action));
        /**************end Notification*******************/

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/register");
    }

        
}