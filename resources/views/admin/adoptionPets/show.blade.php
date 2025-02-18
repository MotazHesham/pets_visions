@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.adoptionPet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.adoption-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.id') }}
                        </th>
                        <td>
                            {{ $adoptionPet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.user') }}
                        </th>
                        <td>
                            {{ $adoptionPet->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.name') }}
                        </th>
                        <td>
                            {{ $adoptionPet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $adoptionPet->pet_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.fasila') }}
                        </th>
                        <td>
                            {{ $adoptionPet->fasila }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.age') }}
                        </th>
                        <td>
                            {{ $adoptionPet->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adoptionPet.fields.photo') }}
                        </th>
                        <td>
                            @if($adoptionPet->photo)
                                <a href="{{ $adoptionPet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $adoptionPet->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.adoption-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection