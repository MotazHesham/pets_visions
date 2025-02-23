<?php

namespace App\Http\Requests;

use App\Models\ClinicService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClinicServiceRequest extends FormRequest
{
    public function authorize()
    { 
        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clinic_services,id',
        ];
    }
}
