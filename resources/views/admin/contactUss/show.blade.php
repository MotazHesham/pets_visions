@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contactUs.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-uss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.id') }}
                        </th>
                        <td>
                            {{ $contactUs->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.first_name') }}
                        </th>
                        <td>
                            {{ $contactUs->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.last_name') }}
                        </th>
                        <td>
                            {{ $contactUs->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.email') }}
                        </th>
                        <td>
                            {{ $contactUs->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.message') }}
                        </th>
                        <td>
                            {{ $contactUs->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactUs.fields.phone') }}
                        </th>
                        <td>
                            {{ $contactUs->phone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-uss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection