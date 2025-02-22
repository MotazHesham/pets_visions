<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;  
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{ 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        if(get_setting('recaptcha_active') && app()->isProduction()){
            if (!$request->has('g-recaptcha-response') || $request->input('g-recaptcha-response') == null) {
                toast(trans('frontend.toast.error'),'error');
                return redirect()->route('frontend.home');
            } 
        }

        Subscription::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        toast(trans('frontend.toast.success'),'success');
        return redirect()->route('frontend.home');
    } 
}
