<?php

namespace App\Http\Requests;

use App\Models\HostingService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHostingServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hosting_service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
