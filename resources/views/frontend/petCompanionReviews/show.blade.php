@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.petCompanionReview.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pet-companion-reviews.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.pet_companion') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->pet_companion->nationality ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.rate') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petCompanionReview.fields.comment') }}
                                    </th>
                                    <td>
                                        {{ $petCompanionReview->comment }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pet-companion-reviews.index') }}">
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