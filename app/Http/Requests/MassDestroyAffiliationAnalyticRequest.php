<?php

namespace App\Http\Requests;

use App\Models\AffiliationAnalytic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAffiliationAnalyticRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('affiliation_analytic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:affiliation_analytics,id',
        ];
    }
}
