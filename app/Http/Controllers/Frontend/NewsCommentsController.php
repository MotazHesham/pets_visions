<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsCommentRequest;
use App\Models\NewsComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsCommentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsComments = NewsComment::with(['news'])->get();

        return view('frontend.newsComments.index', compact('newsComments'));
    }

    public function destroy(NewsComment $newsComment)
    {
        abort_if(Gate::denies('news_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsCommentRequest $request)
    {
        $newsComments = NewsComment::find(request('ids'));

        foreach ($newsComments as $newsComment) {
            $newsComment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
