<?php

namespace App\Http\Requests;

use App\Models\StrayPet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStrayPetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stray_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stray_pets,id',
        ];
    }
}
