<?php

namespace App\Http\Controllers\Staff;
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
        return view('auth.staffs.login');
    }

    protected $redirectTo = '/staff/liststudent';

    public function __construct() {
        $this->middleware('guest:staff')->except('logout');
    }

    public function stafflogin(Request $request) {
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('staff.list.student'));
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function logout() {
        Auth::guard('staff')->logout();
        return redirect('/staff');
    }
}
