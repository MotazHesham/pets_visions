<?php

namespace App\Http\Requests;

use App\Models\StrayPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStrayPetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stray_pet_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'missing_place' => [
                'string',
                'nullable',
            ],
            'receiving_place' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'affiliation_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
