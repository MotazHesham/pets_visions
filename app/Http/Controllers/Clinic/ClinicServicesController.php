<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClinicServiceRequest;
use App\Http\Requests\StoreClinicServiceRequest;
use App\Http\Requests\UpdateClinicServiceRequest;
use App\Models\Clinic;
use App\Models\ClinicService;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClinicServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    { 

        if ($request->ajax()) {
            $query = ClinicService::with(['clinic'])
                        ->where('clinic_id',currentClinic()->id)
                        ->select(sprintf('%s.*', (new ClinicService)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = true;
                $deleteGate    = true;
                $crudRoutePart = 'clinic.clinic-services';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
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
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->addColumn('clinic_clinic_name', function ($row) {
                return $row->clinic ? $row->clinic->clinic_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'clinic']);

            return $table->make(true);
        }

        return view('clinic.clinicServices.index');
    }

    public function create()
    {  
        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('clinic.clinicServices.create', compact('clinics'));
    }

    public function store(StoreClinicServiceRequest $request)
    {
        $clinicService = ClinicService::create($request->all());

        if ($request->input('photo', false)) {
            $clinicService->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('banner', false)) {
            $clinicService->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clinicService->id]);
        }

        return redirect()->route('clinic.clinic-services.index');
    }

    public function edit(ClinicService $clinicService)
    { 

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicService->load('clinic');

        return view('clinic.clinicServices.edit', compact('clinicService', 'clinics'));
    }

    public function update(UpdateClinicServiceRequest $request, ClinicService $clinicService)
    {
        $clinicService->update($request->all());

        if ($request->input('photo', false)) {
            if (! $clinicService->photo || $request->input('photo') !== $clinicService->photo->file_name) {
                if ($clinicService->photo) {
                    $clinicService->photo->delete();
                }
                $clinicService->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($clinicService->photo) {
            $clinicService->photo->delete();
        }

        if ($request->input('banner', false)) {
            if (! $clinicService->banner || $request->input('banner') !== $clinicService->banner->file_name) {
                if ($clinicService->banner) {
                    $clinicService->banner->delete();
                }
                $clinicService->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($clinicService->banner) {
            $clinicService->banner->delete();
        }

        return redirect()->route('clinic.clinic-services.index');
    }

    public function show(ClinicService $clinicService)
    { 

        $clinicService->load('clinic');

        return view('clinic.clinicServices.show', compact('clinicService'));
    }

    public function destroy(ClinicService $clinicService)
    { 

        $clinicService->delete();

        return back();
    }

    public function massDestroy(MassDestroyClinicServiceRequest $request)
    {
        $clinicServices = ClinicService::find(request('ids'));

        foreach ($clinicServices as $clinicService) {
            $clinicService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    { 

        $model         = new ClinicService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
