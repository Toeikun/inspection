<?php

namespace App\Http\Controllers\Officer;

use Auth;
use Alert;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm() {
        return view('auth.officer.login');
    }

    protected $redirectTo = '/officer/dashboard';

    public function __construct() {
        $this->middleware('guest:officer')->except('logout');
    }

    public function login(Request $request) {
        if (Auth::guard('officer')->attempt(['email' => $request->email, 'password' => $request->password, 'permission_id' => 2])) {
            return redirect()->intended(route('officer.dashboard'));
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function logout() {
        Auth::guard('officer')->logout();
        return redirect('/officer');
    }
}
