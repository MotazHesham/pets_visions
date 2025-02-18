@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.petType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.petType.fields.id') }}
                        </th>
                        <td>
                            {{ $petType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petType.fields.name') }}
                        </th>
                        <td>
                            {{ $petType->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pet_type_adoption_pets" role="tab" data-toggle="tab">
                {{ trans('cruds.adoptionPet.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pet_type_stray_pets" role="tab" data-toggle="tab">
                {{ trans('cruds.strayPet.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pet_type_user_pets" role="tab" data-toggle="tab">
                {{ trans('cruds.userPet.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#specializations_stores" role="tab" data-toggle="tab">
                {{ trans('cruds.store.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#specializations_pet_companions" role="tab" data-toggle="tab">
                {{ trans('cruds.petCompanion.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pet_type_adoption_pets">
            @includeIf('admin.petTypes.relationships.petTypeAdoptionPets', ['adoptionPets' => $petType->petTypeAdoptionPets])
        </div>
        <div class="tab-pane" role="tabpanel" id="pet_type_stray_pets">
            @includeIf('admin.petTypes.relationships.petTypeStrayPets', ['strayPets' => $petType->petTypeStrayPets])
        </div>
        <div class="tab-pane" role="tabpanel" id="pet_type_user_pets">
            @includeIf('admin.petTypes.relationships.petTypeUserPets', ['userPets' => $petType->petTypeUserPets])
        </div>
        <div class="tab-pane" role="tabpanel" id="specializations_stores">
            @includeIf('admin.petTypes.relationships.specializationsStores', ['stores' => $petType->specializationsStores])
        </div>
        <div class="tab-pane" role="tabpanel" id="specializations_pet_companions">
            @includeIf('admin.petTypes.relationships.specializationsPetCompanions', ['petCompanions' => $petType->specializationsPetCompanions])
        </div>
    </div>
</div>

@endsection