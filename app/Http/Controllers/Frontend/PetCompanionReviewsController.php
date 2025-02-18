<?php

namespace App\Http\Controllers\Frontend;

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

class PetCompanionReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_companion_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanionReviews = PetCompanionReview::with(['pet_companion', 'user'])->get();

        return view('frontend.petCompanionReviews.index', compact('petCompanionReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('pet_companion_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_companions = PetCompanion::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.petCompanionReviews.create', compact('pet_companions', 'users'));
    }

    public function store(StorePetCompanionReviewRequest $request)
    {
        $petCompanionReview = PetCompanionReview::create($request->all());

        return redirect()->route('frontend.pet-companion-reviews.index');
    }

    public function edit(PetCompanionReview $petCompanionReview)
    {
        abort_if(Gate::denies('pet_companion_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet_companions = PetCompanion::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $petCompanionReview->load('pet_companion', 'user');

        return view('frontend.petCompanionReviews.edit', compact('petCompanionReview', 'pet_companions', 'users'));
    }

    public function update(UpdatePetCompanionReviewRequest $request, PetCompanionReview $petCompanionReview)
    {
        $petCompanionReview->update($request->all());

        return redirect()->route('frontend.pet-companion-reviews.index');
    }

    public function show(PetCompanionReview $petCompanionReview)
    {
        abort_if(Gate::denies('pet_companion_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanionReview->load('pet_companion', 'user');

        return view('frontend.petCompanionReviews.show', compact('petCompanionReview'));
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
