<?php

namespace App\Http\Requests;

use App\Models\PetCompanion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetCompanionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_companion_create');
    }

    public function rules()
    {
        return [
            'specializations.*' => [
                'integer',
            ],
            'specializations' => [
                'required',
                'array',
            ],
            'nationality' => [
                'string',
                'nullable',
            ],
            'affiliation_link' => [
                'string',
                'required',
            ],
        ];
    }
}
