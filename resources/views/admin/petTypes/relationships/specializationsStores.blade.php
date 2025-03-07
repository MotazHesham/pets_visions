@can('store_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stores.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.store.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.store.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-specializationsStores">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.store.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.store_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.store_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.domain') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.specializations') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores as $key => $store)
                        <tr data-entry-id="{{ $store->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $store->id ?? '' }}
                            </td>
                            <td>
                                {{ $store->store_name ?? '' }}
                            </td>
                            <td>
                                {{ $store->store_phone ?? '' }}
                            </td>
                            <td>
                                {{ $store->domain ?? '' }}
                            </td>
                            <td>
                                @if($store->logo)
                                    <a href="{{ $store->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $store->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $store->user->name ?? '' }}
                            </td>
                            <td>
                                @foreach($store->specializations as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('store_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.stores.show', $store->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('store_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.stores.edit', $store->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('store_delete')
                                    <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('store_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stores.massDestroy') }}",
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
  let table = $('.datatable-specializationsStores:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection