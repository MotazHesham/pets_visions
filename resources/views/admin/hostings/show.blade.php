@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hosting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.id') }}
                        </th>
                        <td>
                            {{ $hosting->id }}
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
                            {{ trans('cruds.user.fields.user_position') }}
                        </th>
                        <td>
                            {{ $user->user_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.hosting_name') }}
                        </th>
                        <td>
                            {{ $hosting->hosting_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.hosting_phone') }}
                        </th>
                        <td>
                            {{ $hosting->hosting_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.hosting_type') }}
                        </th>
                        <td>
                            {{ App\Models\Hosting::HOSTING_TYPE_SELECT[$hosting->hosting_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.address') }}
                        </th>
                        <td>
                            {{ $hosting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.about_us') }}
                        </th>
                        <td>
                            {!! $hosting->about_us !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.short_description') }}
                        </th>
                        <td>
                            {{ $hosting->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.logo') }}
                        </th>
                        <td>
                            @if($hosting->logo)
                                <a href="{{ $hosting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $hosting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.cover') }}
                        </th>
                        <td>
                            @if($hosting->cover)
                                <a href="{{ $hosting->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $hosting->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.affiliation_link') }}
                        </th>
                        <td>
                            {{ $hosting->affiliation_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.photos') }}
                        </th>
                        <td>
                            @foreach($hosting->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.identity_photo') }}
                        </th>
                        <td>
                            @if($hosting->identity_photo)
                                <a href="{{ $hosting->identity_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $hosting->identity_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.hosting_services') }}
                        </th>
                        <td>
                            @foreach($hosting->hosting_services as $key => $hosting_services)
                                <span class="label label-info">{{ $hosting_services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hosting.fields.commercial_register_photo') }}
                        </th>
                        <td>
                            @if($hosting->commercial_register_photo)
                                <a href="{{ $hosting->commercial_register_photo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection