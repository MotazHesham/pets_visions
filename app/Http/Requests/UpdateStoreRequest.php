<?php

namespace App\Http\Requests;

use App\Models\Store;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('store_edit');
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
            'store_name' => [
                'string',
                'required',
            ],
            'store_phone' => [
                'string',
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
