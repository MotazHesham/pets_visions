@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('delivery_pet_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.delivery-pets.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.deliveryPet.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.deliveryPet.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DeliveryPet">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.from_city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.to_city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.note') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.deliveryPet.fields.phone') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deliveryPets as $key => $deliveryPet)
                                    <tr data-entry-id="{{ $deliveryPet->id }}">
                                        <td>
                                            {{ $deliveryPet->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\DeliveryPet::FROM_CITY_SELECT[$deliveryPet->from_city] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\DeliveryPet::TO_CITY_SELECT[$deliveryPet->to_city] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $deliveryPet->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $deliveryPet->note ?? '' }}
                                        </td>
                                        <td>
                                            {{ $deliveryPet->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $deliveryPet->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $deliveryPet->phone ?? '' }}
                                        </td>
                                        <td>
                                            @can('delivery_pet_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.delivery-pets.show', $deliveryPet->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('delivery_pet_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.delivery-pets.edit', $deliveryPet->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('delivery_pet_delete')
                                                <form action="{{ route('frontend.delivery-pets.destroy', $deliveryPet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('delivery_pet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.delivery-pets.massDestroy') }}",
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
  let table = $('.datatable-DeliveryPet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection