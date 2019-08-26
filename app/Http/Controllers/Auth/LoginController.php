<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // opt#1
    //     public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'           => 'required|max:255|email',
    //         'password'           => 'required|confirmed',
    //     ]);
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Success
    //         return redirect()->intended('/panel');
    //     } else {
    //         // Go back on error (or do what you want)
    //         return redirect()->back();
    //     }

// }

    // opt#2
    // protected function credentials(Request $request)
    // {
    //     $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
    //     ? $this->username()
    //     : 'username';

    //     return [
    //         $field => $request->get($this->username()),
    //         'password' => $request->password,
    //     ];
    // }

//     validation
    //     public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'           => 'required|max:255|email',
    //         'password'           => 'required|confirmed',
    //     ]);
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Success
    //         return redirect()->intended('/panel');
    //     } else {
    //         // Go back on error (or do what you want)
    //         return redirect()->back();
    //     }

// }
}
