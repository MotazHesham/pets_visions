<?php

namespace App\Http\Requests;

use App\Models\AdoptionPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdoptionPetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('adoption_pet_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'pet_type_id' => [
                'required',
                'integer',
            ],
            'fasila' => [
                'string',
                'required',
            ],
            'age' => [
                'string',
                'required',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
