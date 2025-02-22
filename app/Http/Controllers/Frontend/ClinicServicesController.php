<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\ClinicService;
use Gate;
use Illuminate\Http\Request; 
use Symfony\Component\HttpFoundation\Response;

class ClinicServicesController extends Controller
{ 

    public function show($id)
    { 
        $clinicService = ClinicService::findOrFail($id);
        $clinicService->load('clinic');

        return view('frontend.clinics.show-service', compact('clinicService'));
    } 
}
