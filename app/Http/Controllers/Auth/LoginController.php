<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Initiative;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;
use App\Action;
use Notification;
use App\Notifications\NotifyUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {

        if(auth()->user()){
            $this->guard()->logout();

            $request->session()->flush();

            $request->session()->regenerate();
        }

        $the_user = User::where('user_name', '=', request('email'))->first();
        if ($the_user) {
            $request['email'] = $the_user->email;
        }
        if (auth()->attempt(['email' => $request['email'], 'password' => request('password')])) {
            // Authentication passed...


            /************/
            /**************start Notification*******************/

            $notify_initiaves = DB::table('notify_initiaves')->pluck('initiative_id')->toArray();
            if (count($notify_initiaves) > 0) {
                $initiatives = Initiative::where('end_date', '<=', Carbon::now())->whereNotIn('id', $notify_initiaves)->get();
            } else
                $initiatives = Initiative::where('end_date', '<=', Carbon::now())->get();

            foreach ($initiatives as $initiative) {
                DB::table('notify_initiaves')->insert(['initiative_id' => $initiative->id]);
                $action = Action::create(['title' => "يرجى تقييم المبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/admin/initiative/' . $initiative->id]);
                $action2 = Action::create(['title' => "يرجى تقييم المبادرة $initiative->title ", 'type' => 'تذكير', 'link' => '/initiative/' . $initiative->id]);
                $have_prmission = User::where('id', $initiative->admin->user->id)->pluck('id')->toArray();
                $activsits_ids = User::whereIn('id', $initiative->activists()->pluck('user_id')->toArray())->pluck('id')->toArray();

                //$users_ids = array_merge($activsits_ids, $have_prmission);
                $users = User::whereIn('id', $have_prmission)->get();
                $users2 = User::whereIn('id', $activsits_ids)->get();
                if ($users->first())
                    Notification::send($users, new NotifyUsers($action));
                if ($users2->first())
                    Notification::send($users2, new NotifyUsers($action2));
            }

            /**************end Notification*******************/

            return $this->sendLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function ajaxlogin(Request $request)
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|without_spaces',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $the_user = User::where('user_name', '=', request('email'))->first();
        if ($the_user) {
            $request['email'] = $the_user->email;
        }
        if (auth()->attempt(['email' => $request['email'], 'password' => request('password')], request('remember_me'))) {
            $user = User::where('email', request('email'))->first();
            return '/home';
        } else {
            return response()->json([
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);
        }
    }
}
