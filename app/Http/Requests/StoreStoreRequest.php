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
