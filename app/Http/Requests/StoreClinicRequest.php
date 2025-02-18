<?php

namespace App\Http\Requests;

use App\Models\Clinic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClinicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinic_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ], 
            'identity_num' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'user_position' => [
                'string',
                'nullable',
            ],
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
