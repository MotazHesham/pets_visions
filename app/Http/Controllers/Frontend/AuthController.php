<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ 
    public function login(Request $request){
        $request->validate([
            'login_email' => 'required',
            'login_password' => 'required',
        ]); 
        if (!$request->has('g-recaptcha-response') || $request->input('g-recaptcha-response') == null) {
            return redirect()->route('frontend.home')
            ->withErrors(['invalid_login' => 'خطأ في reCAPTCHA'])
            ->withInput();;
        } 

        $user = User::where('email', $request->login_email)->first();

        if (!$user) {
            return redirect()->route('frontend.home')
            ->withErrors(['invalid_login' => 'رقم الجوال او كلمة المرور خطأ'])
            ->withInput();;
        } 

        if (auth()->attempt(['email' => $request->login_email, 'password' => $request->login_password],$request->filled('remember'))) { 
            Auth::loginUsingId($user->id,$request->filled('remember'));  
            return redirect()->route('frontend.home');
        }else{ 
            return redirect()->route('frontend.home')
            ->withErrors(['invalid_login' => 'رقم الجوال او كلمة المرور خطأ'])
            ->withInput();;
        } 
    }
}
