<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = auth()->user();
        return view('frontend.dashboard.home',compact('user'));
    }
    public function info(){
        $user = auth()->user();
        return view('frontend.dashboard.info',compact('user'));
    }
    public function wishlists(){
        $user = auth()->user();
        return view('frontend.dashboard.wishlists',compact('user'));
    }
    public function profile_edit(){
        $user = auth()->user();
        return view('frontend.dashboard.profile-edit',compact('user'));
    }
    public function profile_update(Request $request){
        $user = auth()->user();
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|max:255',
            'password' => 'nullable|min:8',
        ]);

        $user->update($request->only(['name','email','phone','password']));
        
        toast(trans('frontend.toast.success'),'success');
        return redirect()->route('frontend.dashboard.profile-edit');
    } 
}
