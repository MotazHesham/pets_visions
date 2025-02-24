<?php

namespace App\Http\Controllers\Hosting;

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
        if ($request->ajax()) {
            $query = HostingReview::with(['hosting', 'user'])
                                    ->where('hosting_id',currentHosting()->id)
                                    ->select(sprintf('%s.*', (new HostingReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $deleteGate    = true;
                $crudRoutePart = 'hosting.hosting-reviews';

                return view('partials.datatablesActions_noauth', compact(
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

        return view('hosting.hostingReviews.index');
    }

    public function create()
    { 
        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hosting.hostingReviews.create', compact('hostings', 'users'));
    }

    public function store(StoreHostingReviewRequest $request)
    {
        $hostingReview = HostingReview::create($request->all());

        return redirect()->route('hosting.hosting-reviews.index');
    }

    public function edit(HostingReview $hostingReview)
    { 
        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostingReview->load('hosting', 'user');

        return view('hosting.hostingReviews.edit', compact('hostingReview', 'hostings', 'users'));
    }

    public function update(UpdateHostingReviewRequest $request, HostingReview $hostingReview)
    {
        $hostingReview->update($request->all());

        return redirect()->route('hosting.hosting-reviews.index');
    }

    public function show(HostingReview $hostingReview)
    { 
        $hostingReview->load('hosting', 'user');

        return view('hosting.hostingReviews.show', compact('hostingReview'));
    }

    public function destroy(HostingReview $hostingReview)
    { 
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
