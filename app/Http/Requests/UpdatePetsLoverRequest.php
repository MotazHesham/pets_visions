<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePetsLoverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pets_lover_edit');
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
                'unique:users,email,' . request()->id,
            ], 
            'phone' => [
                'string',
                'nullable',
            ], 
        ];
    }
}
