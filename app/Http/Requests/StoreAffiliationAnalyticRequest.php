<?php

namespace App\Http\Requests;

use App\Models\AffiliationAnalytic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAffiliationAnalyticRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('affiliation_analytic_create');
    }

    public function rules()
    {
        return [
            'model' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ip' => [
                'string',
                'nullable',
            ],
            'num_of_clicks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
