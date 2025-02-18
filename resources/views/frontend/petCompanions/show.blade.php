@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.petCompanion.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pet-companions.index') }}">
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
                                        {{ trans('cruds.petCompanion.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $petCompanion->user->name ?? '' }}
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
                            <a class="btn btn-default" href="{{ route('frontend.pet-companions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection