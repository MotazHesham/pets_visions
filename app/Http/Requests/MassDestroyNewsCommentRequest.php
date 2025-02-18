<?php

namespace App\Http\Requests;

use App\Models\NewsComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNewsCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('news_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:news_comments,id',
        ];
    }
}
