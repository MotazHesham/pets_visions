<?php

namespace App\Http\Requests;

use App\Models\Paramedic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateParamedicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paramedic_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ], 
            'from_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'to_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'affiliation_link' => [
                'string',
                'required',
            ],
        ];
    }
}
