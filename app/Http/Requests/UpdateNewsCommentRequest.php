<?php

namespace App\Http\Requests;

use App\Models\NewsComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_comment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'comment' => [
                'string',
                'nullable',
            ],
        ];
    }
}
