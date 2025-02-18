@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.strayPet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stray-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.id') }}
                        </th>
                        <td>
                            {{ $strayPet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.first_name') }}
                        </th>
                        <td>
                            {{ $strayPet->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.last_name') }}
                        </th>
                        <td>
                            {{ $strayPet->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.email') }}
                        </th>
                        <td>
                            {{ $strayPet->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.phone') }}
                        </th>
                        <td>
                            {{ $strayPet->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.missing_place') }}
                        </th>
                        <td>
                            {{ $strayPet->missing_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.receiving_place') }}
                        </th>
                        <td>
                            {{ $strayPet->receiving_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.date') }}
                        </th>
                        <td>
                            {{ $strayPet->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.note') }}
                        </th>
                        <td>
                            {{ $strayPet->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.user') }}
                        </th>
                        <td>
                            {{ $strayPet->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.pet_type') }}
                        </th>
                        <td>
                            {{ $strayPet->pet_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.photo') }}
                        </th>
                        <td>
                            @if($strayPet->photo)
                                <a href="{{ $strayPet->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $strayPet->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.strayPet.fields.affiliation_link') }}
                        </th>
                        <td>
                            {{ $strayPet->affiliation_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stray-pets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection