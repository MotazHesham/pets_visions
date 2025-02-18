<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPetCompanionRequest;
use App\Http\Requests\StorePetCompanionRequest;
use App\Http\Requests\UpdatePetCompanionRequest;
use App\Models\PetCompanion;
use App\Models\PetType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PetCompanionsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pet_companion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PetCompanion::with(['user', 'specializations'])->select(sprintf('%s.*', (new PetCompanion)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pet_companion_show';
                $editGate      = 'pet_companion_edit';
                $deleteGate    = 'pet_companion_delete';
                $crudRoutePart = 'pet-companions';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });
            $table->editColumn('user_approved', function ($row) {
                return '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'approved\')" value="'. $row->user_id .'" type="checkbox" class="c-switch-input" '. ($row->user->approved ? "checked" : null) .' >
                            <span class="c-switch-slider"></span>
                        </label>' ;
            });

            $table->editColumn('specializations', function ($row) {
                $labels = [];
                foreach ($row->specializations as $specialization) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $specialization->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('affiliation_link', function ($row) {
                return $row->affiliation_link ? $row->affiliation_link : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'specializations', 'photo','user_approved']);

            return $table->make(true);
        }

        return view('admin.petCompanions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pet_companion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $specializations = PetType::pluck('name', 'id');

        return view('admin.petCompanions.create', compact('specializations'));
    }

    public function store(StorePetCompanionRequest $request)
    { 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'approved' => 1,
            'user_type' => 'pet_companion',
            'identity_num' => $request->identity_num,  
        ]);
        $petCompanion = PetCompanion::create([ 
            'user_id' => $user->id,
            'nationality' => $request->nationality,
            'experience' => $request->experience,
            'affiliation_link' => $request->affiliation_link, 
        ]);
        $petCompanion->specializations()->sync($request->input('specializations', []));
        if ($request->input('photo', false)) {
            $petCompanion->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $petCompanion->id]);
        }

        return redirect()->route('admin.pet-companions.index');
    }

    public function edit(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $specializations = PetType::pluck('name', 'id');

        $petCompanion->load('user', 'specializations');

        $user = $petCompanion->user;

        return view('admin.petCompanions.edit', compact('petCompanion', 'specializations', 'user'));
    }

    public function update(UpdatePetCompanionRequest $request, PetCompanion $petCompanion)
    {
        $user = $petCompanion->user;
        $petCompanion->update([  
            'nationality' => $request->nationality,
            'experience' => $request->experience,
            'affiliation_link' => $request->affiliation_link, 
        ]);
        $user->update([  
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password, 
            'identity_num' => $request->identity_num,  
        ]);
        
        $petCompanion->specializations()->sync($request->input('specializations', []));
        if ($request->input('photo', false)) {
            if (! $petCompanion->photo || $request->input('photo') !== $petCompanion->photo->file_name) {
                if ($petCompanion->photo) {
                    $petCompanion->photo->delete();
                }
                $petCompanion->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($petCompanion->photo) {
            $petCompanion->photo->delete();
        }

        return redirect()->route('admin.pet-companions.index');
    }

    public function show(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanion->load('user', 'specializations', 'petCompanionPetCompanionReviews');

        $user = $petCompanion->user;

        return view('admin.petCompanions.show', compact('petCompanion','user'));
    }

    public function destroy(PetCompanion $petCompanion)
    {
        abort_if(Gate::denies('pet_companion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petCompanion->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetCompanionRequest $request)
    {
        $petCompanions = PetCompanion::find(request('ids'));

        foreach ($petCompanions as $petCompanion) {
            $petCompanion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pet_companion_create') && Gate::denies('pet_companion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PetCompanion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
