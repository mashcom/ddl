<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

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

    public function adminLogin()
    {
        $user = User::whereEmail("bmashcom@hotmail.com")->first();
        if ($user->exists()) {
            if (Hash::check('password', '$10$eyMY7sI9rSlDsIIkk9UOgeqPcXWB/ar21NFAGBYfGNtpCJLkS5FEi')) {
               return dump("success");
            }
            return dump("failed");
        }
        return dump('failed not found');
    }
}
