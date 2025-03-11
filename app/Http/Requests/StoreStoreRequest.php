<?php

namespace App\Http\Requests;

use App\Models\Store;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('store_create');
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
                'min:6',
            ], 
            'identity_num' => [
                'regex:/^1\d{9}$/',
                'nullable',
            ],
            'phone' => [
                'regex:/^05\d{8}$/',
                'nullable',
            ],
            'user_position' => [
                'string',
                'nullable',
            ],
            'store_name' => [
                'string',
                'required',
            ],
            'store_phone' => [
                'regex:/^05\d{8}$/',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'domain' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'required',
            ],
            'specializations.*' => [
                'integer',
            ],
            'specializations' => [
                'array',
            ],
        ];
    }
}
