<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClinicReviewRequest;
use App\Http\Requests\StoreClinicReviewRequest;
use App\Http\Requests\UpdateClinicReviewRequest;
use App\Models\Clinic;
use App\Models\ClinicReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClinicReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clinic_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicReviews = ClinicReview::with(['clinic', 'user'])->get();

        return view('frontend.clinicReviews.index', compact('clinicReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.clinicReviews.create', compact('clinics', 'users'));
    }

    public function store(StoreClinicReviewRequest $request)
    {
        $clinicReview = ClinicReview::create($request->all());

        return redirect()->route('frontend.clinic-reviews.index');
    }

    public function edit(ClinicReview $clinicReview)
    {
        abort_if(Gate::denies('clinic_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicReview->load('clinic', 'user');

        return view('frontend.clinicReviews.edit', compact('clinicReview', 'clinics', 'users'));
    }

    public function update(UpdateClinicReviewRequest $request, ClinicReview $clinicReview)
    {
        $clinicReview->update($request->all());

        return redirect()->route('frontend.clinic-reviews.index');
    }

    public function show(ClinicReview $clinicReview)
    {
        abort_if(Gate::denies('clinic_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicReview->load('clinic', 'user');

        return view('frontend.clinicReviews.show', compact('clinicReview'));
    }

    public function destroy(ClinicReview $clinicReview)
    {
        abort_if(Gate::denies('clinic_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyClinicReviewRequest $request)
    {
        $clinicReviews = ClinicReview::find(request('ids'));

        foreach ($clinicReviews as $clinicReview) {
            $clinicReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
