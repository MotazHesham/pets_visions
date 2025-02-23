@extends('layouts.clinic')
@section('content')

    {{-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('clinic.clinic-reviews.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clinicReview.title_singular') }}
            </a>
        </div>
    </div> --}}
        
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.clinicReview.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ClinicReview">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.clinic') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.comment') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinicReview.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('clinic.clinic-reviews.massDestroy') }}",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).data(), function(entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('clinic.clinic-reviews.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'clinic_clinic_name',
                        name: 'clinic.clinic_name'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'rate',
                        name: 'rate'
                    },
                    {
                        data: 'comment',
                        name: 'comment'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-ClinicReview').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
