<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    use MediaUploadingTrait;

    public function update_statuses(Request $request){ 
        $type = $request->type;
        $news = News::findOrFail($request->id);
        $news->$type = $request->status; 
        $news->save();
        return 1;
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = News::query()->select(sprintf('%s.*', (new News)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'news_show';
                $editGate      = 'news_edit';
                $deleteGate    = 'news_delete';
                $crudRoutePart = 'newss';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('published', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'published\')" value="'. $row->id .'" type="checkbox" class="c-switch-input" '. ($row->published ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>';
            });
            $table->editColumn('featured', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'featured\')" value="'. $row->id .'" type="checkbox" class="c-switch-input" '. ($row->featured ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'published', 'featured']);

            return $table->make(true);
        }

        return view('admin.newss.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newss.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->all());

        if ($request->input('photo', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $news->id]);
        }

        return redirect()->route('admin.newss.index');
    }

    public function edit(News $newss)
    {
        abort_if(Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newss.edit', compact('newss'));
    }

    public function update(UpdateNewsRequest $request, News $newss)
    {
        $newss->update($request->all());

        if ($request->input('photo', false)) {
            if (! $newss->photo || $request->input('photo') !== $newss->photo->file_name) {
                if ($newss->photo) {
                    $newss->photo->delete();
                }
                $newss->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($newss->photo) {
            $newss->photo->delete();
        }

        return redirect()->route('admin.newss.index');
    }

    public function show(News $newss)
    {
        abort_if(Gate::denies('news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newss->load('newsNewsComments');

        return view('admin.newss.show', compact('newss'));
    }

    public function destroy(News $newss)
    {
        abort_if(Gate::denies('news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newss->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsRequest $request)
    {
        $newss = News::find(request('ids'));

        foreach ($newss as $news) {
            $news->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('news_create') && Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new News();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
