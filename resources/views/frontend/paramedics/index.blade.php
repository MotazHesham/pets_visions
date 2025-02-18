@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('paramedic_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.paramedics.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.paramedic.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.paramedic.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Paramedic">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.active') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.from_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.to_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.affiliation_link') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paramedics as $key => $paramedic)
                                    <tr data-entry-id="{{ $paramedic->id }}">
                                        <td>
                                            {{ $paramedic->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->name ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $paramedic->active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $paramedic->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $paramedic->from_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->to_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->affiliation_link ?? '' }}
                                        </td>
                                        <td>
                                            @can('paramedic_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.paramedics.show', $paramedic->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('paramedic_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.paramedics.edit', $paramedic->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('paramedic_delete')
                                                <form action="{{ route('frontend.paramedics.destroy', $paramedic->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('paramedic_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.paramedics.massDestroy') }}",
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
  let table = $('.datatable-Paramedic:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection