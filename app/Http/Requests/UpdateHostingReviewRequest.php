<?php

namespace App\Http\Requests;

use App\Models\HostingReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHostingReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hosting_review_edit');
    }

    public function rules()
    {
        return [
            'hosting_id' => [
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
