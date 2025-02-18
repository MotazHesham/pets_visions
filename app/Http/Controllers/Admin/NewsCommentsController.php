<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsCommentRequest;
use App\Models\NewsComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NewsCommentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('news_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NewsComment::with(['news'])->select(sprintf('%s.*', (new NewsComment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'news_comment_show';
                $editGate      = 'news_comment_edit';
                $deleteGate    = 'news_comment_delete';
                $crudRoutePart = 'news-comments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('news_added_by', function ($row) {
                return $row->news ? $row->news->added_by : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('comment', function ($row) {
                return $row->comment ? $row->comment : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'news']);

            return $table->make(true);
        }

        return view('admin.newsComments.index');
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
