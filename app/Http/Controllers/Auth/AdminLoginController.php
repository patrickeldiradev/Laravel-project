<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:users')->except('logout');
    }

    public function showLoginForm (){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        //validate form
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attemp to login
        if (Auth::guard('users')->attempt(['email' => $request->email , 'password' => $request->password], $request->remember)) {
            //if successful redirect to admin index page
            return redirect()->intended(route('brand.index'));
        }

        //if unsuccessful return redirect
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout() {
        Auth::guard('users')->logout();
        return redirect('/');
    }


}
