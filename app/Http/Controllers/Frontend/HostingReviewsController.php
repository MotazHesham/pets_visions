<?php

namespace App\Http\Controllers\Frontend;

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

class HostingReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hosting_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingReviews = HostingReview::with(['hosting', 'user'])->get();

        return view('frontend.hostingReviews.index', compact('hostingReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('hosting_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.hostingReviews.create', compact('hostings', 'users'));
    }

    public function store(StoreHostingReviewRequest $request)
    {
        $hostingReview = HostingReview::create($request->all());

        return redirect()->route('frontend.hosting-reviews.index');
    }

    public function edit(HostingReview $hostingReview)
    {
        abort_if(Gate::denies('hosting_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostings = Hosting::pluck('hosting_phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostingReview->load('hosting', 'user');

        return view('frontend.hostingReviews.edit', compact('hostingReview', 'hostings', 'users'));
    }

    public function update(UpdateHostingReviewRequest $request, HostingReview $hostingReview)
    {
        $hostingReview->update($request->all());

        return redirect()->route('frontend.hosting-reviews.index');
    }

    public function show(HostingReview $hostingReview)
    {
        abort_if(Gate::denies('hosting_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingReview->load('hosting', 'user');

        return view('frontend.hostingReviews.show', compact('hostingReview'));
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
