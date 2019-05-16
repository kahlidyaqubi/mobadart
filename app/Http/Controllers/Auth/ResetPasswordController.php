<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validator = \Validator::make(
            ['email' => $request->get('email')],
            ['email' => 'required|email|min:6|max:255']
        );

        if($validator->passes()) {
            //$response = $this->passwords->sendResetLink($request->only('email'));
            $response = $this->passwords->sendResetLink($request->only('email'), function ($m) {
                $m->subject($this->getEmailSubject());
            });

            switch ($response) {
                case PasswordBroker::RESET_LINK_SENT:
                    return \Response::json(['success' => 'true']);

                case PasswordBroker::INVALID_USER:
                    return \Response::json(['success' => 'true', 'status' => trans($response)]);
            }
        } else {
            return \Response::json(['error' => [
                'messages' => $validator->getMessageBag(),
                'rules' => $validator->getRules()
            ]]);
        }
    }
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
        $this->middleware('guest');
    }
}
