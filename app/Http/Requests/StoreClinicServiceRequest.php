<?php

namespace App\Http\Requests;

use App\Models\ClinicService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClinicServiceRequest extends FormRequest
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
            'photo' => [
                'required',
            ],
            'short_description' => [
                'string',
                'required',
            ],
            'affiliation_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
