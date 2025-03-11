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
                'nullable',
                'regex:/^1\d{9}$/', 
            ],
            'phone' => [ 
                'nullable',
                'regex:/^05\d{8}$/',
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
                'regex:/^05\d{8}$/',
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
