<?php

namespace App\Http\Requests;

use App\Models\ClinicReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClinicReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clinic_id' => [
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
