<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
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
    public function redirectTo()
    {
        // Check user role
        switch (Auth::user()->role->name) {
            case 'manager':
                return '/manager/dashboard';
                break;

            case 'employee':
                return '/user/dashboard';
                break;

            default:
                return '/home';
                break;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
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
