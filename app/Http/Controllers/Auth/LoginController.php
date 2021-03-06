<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){

        // User role
        $role = Auth::user()->is_admin;
    
        // Check user role
        switch ($role) {
            case '0':
                    return '/home';
                break;
            case '1':
                    return '/admin';
                break;
            default:
                    return '/login';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $login = request()->input('matric_no');
        request()->merge(['matric_no' => $login]);

        return 'matric_no';
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            'matric_no.required' => 'Email or username cannot be empty',
            'matric_no.exists' => 'Username is already registered',
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'matric_no' => 'required|string',
            'password' => 'required|string',
        ], $messages);
    }
}
