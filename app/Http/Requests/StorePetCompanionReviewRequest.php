<?php

namespace App\Http\Requests;

use App\Models\PetCompanionReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetCompanionReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_companion_review_create');
    }

    public function rules()
    {
        return [
            'pet_companion_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'rate' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
