<?php

namespace App\Http\Requests;

use App\Models\HostingService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHostingServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hosting_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hosting_services,id',
        ];
    }
}
