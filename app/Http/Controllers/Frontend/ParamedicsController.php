<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParamedicRequest;
use App\Http\Requests\StoreParamedicRequest;
use App\Http\Requests\UpdateParamedicRequest;
use App\Models\Paramedic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParamedicsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paramedic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paramedics = Paramedic::all();

        return view('frontend.paramedics.index', compact('paramedics'));
    }

    public function create()
    {
        abort_if(Gate::denies('paramedic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.paramedics.create');
    }

    public function store(StoreParamedicRequest $request)
    {
        $paramedic = Paramedic::create($request->all());

        return redirect()->route('frontend.paramedics.index');
    }

    public function edit(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.paramedics.edit', compact('paramedic'));
    }

    public function update(UpdateParamedicRequest $request, Paramedic $paramedic)
    {
        $paramedic->update($request->all());

        return redirect()->route('frontend.paramedics.index');
    }

    public function show(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.paramedics.show', compact('paramedic'));
    }

    public function destroy(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paramedic->delete();

        return back();
    }

    public function massDestroy(MassDestroyParamedicRequest $request)
    {
        $paramedics = Paramedic::find(request('ids'));

        foreach ($paramedics as $paramedic) {
            $paramedic->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
