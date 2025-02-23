<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StorePetsLoverRequest;
use App\Http\Requests\UpdatePetsLoverRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PetsLoversController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pets_lover_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = User::where('user_type','pet_lover')->select(sprintf('%s.*', (new User)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pets_lover_show';
                $editGate      = $row->id != 1 ? 'pets_lover_edit' : false;
                $deleteGate    = $row->id != 1 ? 'pets_lover_delete' : false;
                $crudRoutePart = 'pets-lovers';

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
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('approved', function ($row) {
                return $row->id != 1 ?'<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'approved\')" value="'. $row->id .'" type="checkbox" class="c-switch-input" '. ($row->approved ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>' : '';
            }); 

            $table->rawColumns(['actions', 'placeholder', 'approved' ]);

            return $table->make(true);
        }
        return view('admin.petsLovers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pets_lover_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petsLovers.create');
    }

    public function store(StorePetsLoverRequest $request)
    {
        User::create($request->all());

        return redirect()->route('admin.pets-lovers.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('pets_lover_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findOrFail($id);

        return view('admin.petsLovers.edit', compact('user'));
    }

    public function update(UpdatePetsLoverRequest $request, $id)
    {
        $petsLover = User::findOrFail($id);
        $petsLover->update($request->all());

        return redirect()->route('admin.pets-lovers.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('pets_lover_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findOrFail($id);

        return view('admin.petsLovers.show', compact('user'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('pets_lover_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petsLover = User::findOrFail($id);
        $petsLover->delete();

        return back();
    } 
}
