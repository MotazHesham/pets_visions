<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Clinic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->user_type == 'staff') {
            return redirect()->route('admin.home');
        } elseif(auth()->user()->user_type == 'pet_companion') {
            return redirect()->route('pet-companion.home');
        } elseif(auth()->user()->user_type == 'clinic') {
            return $next($request);
        } elseif(auth()->user()->user_type == 'host') {
            return redirect()->route('hosting.home');
        } elseif(auth()->user()->user_type == 'store') {
            return redirect()->route('store.home');
        }else {
            return redirect()->route('frontend.home');
        } 
    }
}
