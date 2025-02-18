<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHostingReviewRequest;
use App\Http\Requests\StoreHostingReviewRequest;
use App\Http\Requests\UpdateHostingReviewRequest;
use App\Models\Hosting;
use App\Models\HostingReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HostingReviewsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('hosting_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HostingReview::with(['hosting', 'user'])->select(sprintf('%s.*', (new HostingReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hosting_review_show';
                $editGate      = 'hosting_review_edit';
                $deleteGate    = 'hosting_review_delete';
                $crudRoutePart = 'hosting-reviews';

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
            $table->addColumn('hosting_hosting_phone', function ($row) {
                return $row->hosting ? $row->hosting->hosting_phone : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('rate', function ($row) {
                return $row->rate ? $row->rate : '';
            });
            $table->editColumn('comment', function ($row) {
                return $row->comment ? $row->comment : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hosting', 'user']);

            return $table->make(true);
        }

        return view('admin.hostingReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hosting_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hostingReviews.create', compact('hostings', 'users'));
    }

    public function store(StoreHostingReviewRequest $request)
    {
        $hostingReview = HostingReview::create($request->all());

        return redirect()->route('admin.hosting-reviews.index');
    }

    public function edit(HostingReview $hostingReview)
    {
        abort_if(Gate::denies('hosting_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostingReview->load('hosting', 'user');

        return view('admin.hostingReviews.edit', compact('hostingReview', 'hostings', 'users'));
    }

    public function update(UpdateHostingReviewRequest $request, HostingReview $hostingReview)
    {
        $hostingReview->update($request->all());

        return redirect()->route('admin.hosting-reviews.index');
    }

    public function show(HostingReview $hostingReview)
    {
        abort_if(Gate::denies('hosting_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingReview->load('hosting', 'user');

        return view('admin.hostingReviews.show', compact('hostingReview'));
    }

    public function destroy(HostingReview $hostingReview)
    {
        abort_if(Gate::denies('hosting_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostingReviewRequest $request)
    {
        $hostingReviews = HostingReview::find(request('ids'));

        foreach ($hostingReviews as $hostingReview) {
            $hostingReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
