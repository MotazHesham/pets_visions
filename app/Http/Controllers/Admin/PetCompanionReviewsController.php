<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetCompanionReviewRequest;
use App\Http\Requests\StorePetCompanionReviewRequest;
use App\Http\Requests\UpdatePetCompanionReviewRequest;
use App\Models\PetCompanion;
use App\Models\PetCompanionReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PetCompanionReviewsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pet_companion_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PetCompanionReview::with(['pet_companion', 'user'])->select(sprintf('%s.*', (new PetCompanionReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pet_companion_review_show';
                $editGate      = 'pet_companion_review_edit';
                $deleteGate    = 'pet_companion_review_delete';
                $crudRoutePart = 'pet-companion-reviews';

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
            $table->addColumn('pet_companion_nationality', function ($row) {
                return $row->pet_companion ? $row->pet_companion->nationality : '';
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

            $table->rawColumns(['actions', 'placeholder', 'pet_companion', 'user']);

            return $table->make(true);
        }

        return view('admin.petCompanionReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pet_companion_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_companions = PetCompanion::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.petCompanionReviews.create', compact('pet_companions', 'users'));
    }

    public function store(StorePetCompanionReviewRequest $request)
    {
        $petCompanionReview = PetCompanionReview::create($request->all());

        return redirect()->route('admin.pet-companion-reviews.index');
    }

    public function edit(PetCompanionReview $petCompanionReview)
    {
        abort_if(Gate::denies('pet_companion_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_companions = PetCompanion::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $petCompanionReview->load('pet_companion', 'user');

        return view('admin.petCompanionReviews.edit', compact('petCompanionReview', 'pet_companions', 'users'));
    }

    public function update(UpdatePetCompanionReviewRequest $request, PetCompanionReview $petCompanionReview)
    {
        $petCompanionReview->update($request->all());

        return redirect()->route('admin.pet-companion-reviews.index');
    }

    public function show(PetCompanionReview $petCompanionReview)
    {
        abort_if(Gate::denies('pet_companion_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanionReview->load('pet_companion', 'user');

        return view('admin.petCompanionReviews.show', compact('petCompanionReview'));
    }

    public function destroy(PetCompanionReview $petCompanionReview)
    {
        abort_if(Gate::denies('pet_companion_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanionReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetCompanionReviewRequest $request)
    {
        $petCompanionReviews = PetCompanionReview::find(request('ids'));

        foreach ($petCompanionReviews as $petCompanionReview) {
            $petCompanionReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
