<?php

namespace App\Http\Requests;

use App\Models\Hosting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHostingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hosting_create');
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
            'hosting_name' => [
                'string',
                'nullable',
            ],
            'hosting_phone' => [
                'string',
                'required',
            ],
            'hosting_type' => [
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'required',
            ],
            'affiliation_link' => [
                'string',
                'required',
            ],
            'photos' => [
                'array',
            ],
            'hosting_services.*' => [
                'integer',
            ],
            'hosting_services' => [
                'required',
                'array',
            ],
        ];
    }
}
