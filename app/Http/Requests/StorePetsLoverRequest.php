<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetsLoverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pets_lover_create');
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
                'unique:users',
            ],
            'password' => [
                'required',
                'min:6'
            ], 
            'phone' => [
                'string',
                'nullable',
            ], 
        ];
    }
}
