<?php

namespace App\Http\Requests;

use App\Models\PetCompanion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPetCompanionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pet_companion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pet_companions,id',
        ];
    }
}
