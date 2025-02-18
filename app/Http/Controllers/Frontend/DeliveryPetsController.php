<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveryPetRequest;
use App\Http\Requests\StoreDeliveryPetRequest;
use App\Http\Requests\UpdateDeliveryPetRequest;
use App\Models\DeliveryPet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryPetsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPets = DeliveryPet::all();

        return view('frontend.deliveryPets.index', compact('deliveryPets'));
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_pet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPets.create');
    }

    public function store(StoreDeliveryPetRequest $request)
    {
        $deliveryPet = DeliveryPet::create($request->all());

        return redirect()->route('frontend.delivery-pets.index');
    }

    public function edit(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPets.edit', compact('deliveryPet'));
    }

    public function update(UpdateDeliveryPetRequest $request, DeliveryPet $deliveryPet)
    {
        $deliveryPet->update($request->all());

        return redirect()->route('frontend.delivery-pets.index');
    }

    public function show(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPets.show', compact('deliveryPet'));
    }

    public function destroy(DeliveryPet $deliveryPet)
    {
        abort_if(Gate::denies('delivery_pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPet->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryPetRequest $request)
    {
        $deliveryPets = DeliveryPet::find(request('ids'));

        foreach ($deliveryPets as $deliveryPet) {
            $deliveryPet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
