<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetTypeRequest;
use App\Http\Requests\StorePetTypeRequest;
use App\Http\Requests\UpdatePetTypeRequest;
use App\Models\PetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petTypes = PetType::all();

        return view('frontend.petTypes.index', compact('petTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('pet_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.petTypes.create');
    }

    public function store(StorePetTypeRequest $request)
    {
        $petType = PetType::create($request->all());

        return redirect()->route('frontend.pet-types.index');
    }

    public function edit(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.petTypes.edit', compact('petType'));
    }

    public function update(UpdatePetTypeRequest $request, PetType $petType)
    {
        $petType->update($request->all());

        return redirect()->route('frontend.pet-types.index');
    }

    public function show(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.petTypes.show', compact('petType'));
    }

    public function destroy(PetType $petType)
    {
        abort_if(Gate::denies('pet_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetTypeRequest $request)
    {
        $petTypes = PetType::find(request('ids'));

        foreach ($petTypes as $petType) {
            $petType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
