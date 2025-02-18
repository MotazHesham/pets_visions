@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('clinic_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.clinics.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.clinic.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.clinic.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Clinic">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clinic.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.clinic_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.clinic_phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.unified_phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.short_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.logo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clinic.fields.user') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clinics as $key => $clinic)
                                    <tr data-entry-id="{{ $clinic->id }}">
                                        <td>
                                            {{ $clinic->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clinic->clinic_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clinic->clinic_phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clinic->unified_phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clinic->short_description ?? '' }}
                                        </td>
                                        <td>
                                            @if($clinic->logo)
                                                <a href="{{ $clinic->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $clinic->logo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $clinic->user->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('clinic_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.clinics.show', $clinic->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('clinic_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.clinics.edit', $clinic->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('clinic_delete')
                                                <form action="{{ route('frontend.clinics.destroy', $clinic->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('clinic_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.clinics.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Clinic:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection