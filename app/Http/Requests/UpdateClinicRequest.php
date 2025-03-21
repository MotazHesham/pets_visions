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
        return true;
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
                'unique:users,email,' . request()->user_id,
            ], 
            'identity_num' => [
                'string',
                'regex:/^[12]\d{9}$/',
            ],
            'phone' => [
                'regex:/^05\d{8}$/',
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
