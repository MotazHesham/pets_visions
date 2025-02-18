<?php

namespace App\Http\Requests;

use App\Models\Clinic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClinicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinic_edit');
    }

    public function rules()
    {
        return [
            'clinic_name' => [
                'string',
                'required',
            ],
            'clinic_phone' => [
                'string',
                'nullable',
            ],
            'unified_phone' => [
                'string',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
