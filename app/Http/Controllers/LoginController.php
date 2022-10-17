<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha',
        ]);

        $credentials=$request->only(['username','password']);

        // $rememberMe=$request->has('remember_me') ? true : false;
        $rememberMe=false;

        if(Auth::attempt($credentials,$rememberMe)){
            return redirect()->route('landing.index');
        }

        return redirect()->route('login')->with('failed_login','Periksa Password dan Username Anda');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function captchaReload(){
        return response()->json(['captcha'=> captcha_img('custom')]);
    }

}
