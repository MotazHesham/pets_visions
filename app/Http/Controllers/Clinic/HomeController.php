<?php

namespace App\Http\Controllers\Clinic; 

class HomeController
{
    public function index()
    { 
        return view('clinic.home');
    }
}
