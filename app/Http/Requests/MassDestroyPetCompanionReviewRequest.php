<?php

namespace App\Http\Requests;

use App\Models\PetCompanionReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPetCompanionReviewRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pet_companion_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pet_companion_reviews,id',
        ];
    }
}
