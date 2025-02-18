@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.petCompanion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-companions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.id') }}
                        </th>
                        <td>
                            {{ $petCompanion->id }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $user->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.specializations') }}
                        </th>
                        <td>
                            @foreach($petCompanion->specializations as $key => $specializations)
                                <span class="label label-info">{{ $specializations->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.photo') }}
                        </th>
                        <td>
                            @if($petCompanion->photo)
                                <a href="{{ $petCompanion->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $petCompanion->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.nationality') }}
                        </th>
                        <td>
                            {{ $petCompanion->nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.experience') }}
                        </th>
                        <td>
                            {!! $petCompanion->experience !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petCompanion.fields.affiliation_link') }}
                        </th>
                        <td>
                            {{ $petCompanion->affiliation_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-companions.index') }}">
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
            <a class="nav-link" href="#pet_companion_pet_companion_reviews" role="tab" data-toggle="tab">
                {{ trans('cruds.petCompanionReview.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pet_companion_pet_companion_reviews">
            @includeIf('admin.petCompanions.relationships.petCompanionPetCompanionReviews', ['petCompanionReviews' => $petCompanion->petCompanionPetCompanionReviews])
        </div>
    </div>
</div>

@endsection