<?php

namespace App\Http\Requests;

use App\Models\HostingService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHostingServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hosting_service_create');
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
