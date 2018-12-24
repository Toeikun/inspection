<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Alert;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/student/list';

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status_id' => 1])) {
            return redirect()->intended(route('student.list'));
        } else if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status_id' => 2])) {
            return redirect()->intended(route('student.bill'));
        } else {
            return back()->withErrors(['email' => 'Email or password are wrong.']);
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('/');
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
}
