<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class ClinicReviewsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('clinic_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClinicReview::with(['clinic', 'user'])->select(sprintf('%s.*', (new ClinicReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'clinic_review_show';
                $editGate      = 'clinic_review_edit';
                $deleteGate    = 'clinic_review_delete';
                $crudRoutePart = 'clinic-reviews';

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
            $table->addColumn('clinic_clinic_name', function ($row) {
                return $row->clinic ? $row->clinic->clinic_name : '';
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

            $table->rawColumns(['actions', 'placeholder', 'clinic', 'user']);

            return $table->make(true);
        }

        return view('admin.clinicReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clinicReviews.create', compact('clinics', 'users'));
    }

    public function store(StoreClinicReviewRequest $request)
    {
        $clinicReview = ClinicReview::create($request->all());

        return redirect()->route('admin.clinic-reviews.index');
    }

    public function edit(ClinicReview $clinicReview)
    {
        abort_if(Gate::denies('clinic_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicReview->load('clinic', 'user');

        return view('admin.clinicReviews.edit', compact('clinicReview', 'clinics', 'users'));
    }

    public function update(UpdateClinicReviewRequest $request, ClinicReview $clinicReview)
    {
        $clinicReview->update($request->all());

        return redirect()->route('admin.clinic-reviews.index');
    }

    public function show(ClinicReview $clinicReview)
    {
        abort_if(Gate::denies('clinic_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicReview->load('clinic', 'user');

        return view('admin.clinicReviews.show', compact('clinicReview'));
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
