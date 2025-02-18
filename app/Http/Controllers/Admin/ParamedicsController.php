<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParamedicRequest;
use App\Http\Requests\StoreParamedicRequest;
use App\Http\Requests\UpdateParamedicRequest;
use App\Models\Paramedic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ParamedicsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('paramedic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Paramedic::query()->select(sprintf('%s.*', (new Paramedic)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'paramedic_show';
                $editGate      = 'paramedic_edit';
                $deleteGate    = 'paramedic_delete';
                $crudRoutePart = 'paramedics';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->editColumn('from_time', function ($row) {
                return $row->from_time ? $row->from_time : '';
            });
            $table->editColumn('to_time', function ($row) {
                return $row->to_time ? $row->to_time : '';
            });
            $table->editColumn('affiliation_link', function ($row) {
                return $row->affiliation_link ? $row->affiliation_link : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active']);

            return $table->make(true);
        }

        return view('admin.paramedics.index');
    }

    public function create()
    {
        abort_if(Gate::denies('paramedic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paramedics.create');
    }

    public function store(StoreParamedicRequest $request)
    {
        $paramedic = Paramedic::create($request->all());

        return redirect()->route('admin.paramedics.index');
    }

    public function edit(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paramedics.edit', compact('paramedic'));
    }

    public function update(UpdateParamedicRequest $request, Paramedic $paramedic)
    {
        $paramedic->update($request->all());

        return redirect()->route('admin.paramedics.index');
    }

    public function show(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paramedics.show', compact('paramedic'));
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
