<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetsLoverRequest;
use App\Http\Requests\StorePetsLoverRequest;
use App\Http\Requests\UpdatePetsLoverRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetsLoversController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pets_lover_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petsLovers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pets_lover_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petsLovers.create');
    }

    public function store(StorePetsLoverRequest $request)
    {
        $petsLover = PetsLover::create($request->all());

        return redirect()->route('admin.pets-lovers.index');
    }

    public function edit(PetsLover $petsLover)
    {
        abort_if(Gate::denies('pets_lover_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petsLovers.edit', compact('petsLover'));
    }

    public function update(UpdatePetsLoverRequest $request, PetsLover $petsLover)
    {
        $petsLover->update($request->all());

        return redirect()->route('admin.pets-lovers.index');
    }

    public function show(PetsLover $petsLover)
    {
        abort_if(Gate::denies('pets_lover_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petsLovers.show', compact('petsLover'));
    }

    public function destroy(PetsLover $petsLover)
    {
        abort_if(Gate::denies('pets_lover_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petsLover->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetsLoverRequest $request)
    {
        $petsLovers = PetsLover::find(request('ids'));

        foreach ($petsLovers as $petsLover) {
            $petsLover->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
