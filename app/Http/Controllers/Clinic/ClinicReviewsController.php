<?php

namespace App\Http\Controllers\Clinic;

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

        if ($request->ajax()) {
            $query = ClinicReview::with(['clinic', 'user'])
                                    ->where('clinic_id',currentClinic()->id)
                                    ->select(sprintf('%s.*', (new ClinicReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $deleteGate    = true;
                $crudRoutePart = 'clinic.clinic-reviews';

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

        return view('clinic.clinicReviews.index');
    }

    public function create()
    { 

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('clinic.clinicReviews.create', compact('clinics', 'users'));
    }

    public function store(StoreClinicReviewRequest $request)
    {
        $clinicReview = ClinicReview::create($request->all());

        return redirect()->route('clinic.clinic-reviews.index');
    }

    public function edit(ClinicReview $clinicReview)
    { 

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicReview->load('clinic', 'user');

        return view('clinic.clinicReviews.edit', compact('clinicReview', 'clinics', 'users'));
    }

    public function update(UpdateClinicReviewRequest $request, ClinicReview $clinicReview)
    {
        $clinicReview->update($request->all());

        return redirect()->route('clinic.clinic-reviews.index');
    }

    public function show(ClinicReview $clinicReview)
    { 

        $clinicReview->load('clinic', 'user');

        return view('clinic.clinicReviews.show', compact('clinicReview'));
    }

    public function destroy(ClinicReview $clinicReview)
    { 

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
