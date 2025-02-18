<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHostingServiceRequest;
use App\Http\Requests\StoreHostingServiceRequest;
use App\Http\Requests\UpdateHostingServiceRequest;
use App\Models\HostingService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HostingServicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hosting_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingServices = HostingService::all();

        return view('admin.hostingServices.index', compact('hostingServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('hosting_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hostingServices.create');
    }

    public function store(StoreHostingServiceRequest $request)
    {
        $hostingService = HostingService::create($request->all());

        return redirect()->route('admin.hosting-services.index');
    }

    public function edit(HostingService $hostingService)
    {
        abort_if(Gate::denies('hosting_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hostingServices.edit', compact('hostingService'));
    }

    public function update(UpdateHostingServiceRequest $request, HostingService $hostingService)
    {
        $hostingService->update($request->all());

        return redirect()->route('admin.hosting-services.index');
    }

    public function show(HostingService $hostingService)
    {
        abort_if(Gate::denies('hosting_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingService->load('hostingServicesHostings');

        return view('admin.hostingServices.show', compact('hostingService'));
    }

    public function destroy(HostingService $hostingService)
    {
        abort_if(Gate::denies('hosting_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostingService->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostingServiceRequest $request)
    {
        $hostingServices = HostingService::find(request('ids'));

        foreach ($hostingServices as $hostingService) {
            $hostingService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
