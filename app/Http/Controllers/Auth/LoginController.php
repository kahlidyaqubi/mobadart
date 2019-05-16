<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;

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
        $the_user = User::where('user_name', '=', request('email'))->first();
        if ($the_user) {
            $request['email'] = $the_user->email;
        }
        if (auth()->attempt(['email' => $request['email'], 'password' => request('password')])) {
            // Authentication passed...
            return $this->sendLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function ajaxlogin(Request $request)
    {
        Validator::extend('without_spaces', function($attr, $value){
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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
