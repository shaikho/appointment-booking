@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@can('appointment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.appointments.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.drafted_appointment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Appointment">
            <thead>
                <tr>
                    @if (app()->getLocale() == 'en')
                        <th width="10">
                        Actions
                        </th>
                    @else
                        <th>
                            &nbsp;
                        </th>
                    @endif
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.client') }}
                    </th>
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.finish_time') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.drafted_appointment.fields.price') }}
                    </th> --}}
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.comments') }}
                    </th>
                    <th>
                        {{ trans('cruds.drafted_appointment.fields.services') }}
                    </th>
                    @if (app()->getLocale() == 'en')<th>
                            &nbsp;
                        </th>


                    @else
                        <th width="10">
                        العمليات
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
    ajax: "{{ route('admin.draftedappointments') }}",
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

@if (Session::has('created'))
<script>
Swal.fire(
    'Success!',
    'Appointment created waiting for your submission.',
    'success'
)
</script>
{{Session::forget('created')}}
@endif

@if (Session::has('success'))
<script>
Swal.fire(
    'Success!',
    'Appointment submitted waiting for approval.',
    'success'
)
</script>
{{Session::forget('success')}}
@endif

@if (Session::has('datelimitfail'))
<script>
Swal.fire(
    'Failed!',
    'Sorry the date you picked is fully booked, please edit your appointment accordingly.',
    'error'
)
</script>
{{Session::forget('datelimitfail')}}
@endif

@if (Session::has('hourslimitviolated'))
<script>
Swal.fire(
    'Failed!',
    'Sorry your appointment violates appointment hours limitaion, please update your appointment accordingly',
    'error'
)
</script>
{{Session::forget('hourslimitviolated')}}
@endif

@endsection
