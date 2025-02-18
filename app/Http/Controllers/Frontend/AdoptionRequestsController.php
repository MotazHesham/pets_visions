<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdoptionRequestRequest;
use App\Http\Requests\StoreAdoptionRequestRequest;
use App\Http\Requests\UpdateAdoptionRequestRequest;
use App\Models\AdoptionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdoptionRequestsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('adoption_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionRequests = AdoptionRequest::all();

        return view('frontend.adoptionRequests.index', compact('adoptionRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('adoption_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.adoptionRequests.create');
    }

    public function store(StoreAdoptionRequestRequest $request)
    {
        $adoptionRequest = AdoptionRequest::create($request->all());

        return redirect()->route('frontend.adoption-requests.index');
    }

    public function edit(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.adoptionRequests.edit', compact('adoptionRequest'));
    }

    public function update(UpdateAdoptionRequestRequest $request, AdoptionRequest $adoptionRequest)
    {
        $adoptionRequest->update($request->all());

        return redirect()->route('frontend.adoption-requests.index');
    }

    public function show(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.adoptionRequests.show', compact('adoptionRequest'));
    }

    public function destroy(AdoptionRequest $adoptionRequest)
    {
        abort_if(Gate::denies('adoption_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adoptionRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdoptionRequestRequest $request)
    {
        $adoptionRequests = AdoptionRequest::find(request('ids'));

        foreach ($adoptionRequests as $adoptionRequest) {
            $adoptionRequest->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
