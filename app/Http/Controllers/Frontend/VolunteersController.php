<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\Volunteer; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VolunteersController extends Controller
{
    public function volunteers()
    {   
        return view('frontend.volunteers');
    } 

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required', 
            'age' => 'required', 
            'experience' => 'required', 
            'fields' => 'required', 
            'period_time' => 'required', 
            'note' => 'required',
        ]);

        Volunteer::create($request->only([
            'first_name', 'last_name', 'phone', 'email',
            'gender', 'age', 'experience', 'fields',
            'period_time', 'note',
        ])); 

        toast(trans('frontend.toast.success'),'success');
        return redirect()->back(); 
    }

}
