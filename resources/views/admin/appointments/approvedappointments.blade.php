@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.approved_appointment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Appointment">
            <thead>
                <tr>
                    @if(app()->getLocale() == 'ar')
                    <th width="10">

                    </th>


                    @else
                    <th>
                        Actions
                    </th>
                    @endif
                    <th>
                        {{ trans('cruds.approved_appointment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.approved_appointment.fields.client') }}
                    </th>
                    <th>
                        {{ trans('cruds.approved_appointment.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.approved_appointment.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.approved_appointment.fields.finish_time') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.approved_appointment.fields.price') }}
                    </th> --}}
                    <th>
                        {{ trans('cruds.approved_appointment.fields.comments') }}
                    </th>
                    <th>
                        {{ trans('cruds.approved_appointment.fields.services') }}
                    </th>
                    @if(app()->getLocale() == 'ar')
                    <th>
                        العمليات
                    </th>
                    @else
                    <th width="10">

                    </th>
                    @endif
                </tr>
            </thead>
        </table>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('appointment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.appointments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.approvedappointments') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'client_name', name: 'client.name' },
{ data: 'employee_name', name: 'employee.name' },
{ data: 'start_time', name: 'start_time' },
{ data: 'finish_time', name: 'finish_time' },
// { data: 'price', name: 'price' },
{ data: 'comments', name: 'comments' },
{ data: 'services', name: 'services.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Appointment').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection
