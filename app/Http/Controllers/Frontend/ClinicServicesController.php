<?php

namespace App\Http\Controllers\Frontend;

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

class ClinicServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('clinic_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicServices = ClinicService::with(['clinic', 'media'])->get();

        return view('frontend.clinicServices.index', compact('clinicServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.clinicServices.create', compact('clinics'));
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

        return redirect()->route('frontend.clinic-services.index');
    }

    public function edit(ClinicService $clinicService)
    {
        abort_if(Gate::denies('clinic_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinicService->load('clinic');

        return view('frontend.clinicServices.edit', compact('clinicService', 'clinics'));
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

        return redirect()->route('frontend.clinic-services.index');
    }

    public function show(ClinicService $clinicService)
    {
        abort_if(Gate::denies('clinic_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicService->load('clinic');

        return view('frontend.clinicServices.show', compact('clinicService'));
    }

    public function destroy(ClinicService $clinicService)
    {
        abort_if(Gate::denies('clinic_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('clinic_service_create') && Gate::denies('clinic_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClinicService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
