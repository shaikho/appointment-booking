@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        @if(Session::get('role') == '2')
        {{ trans('global.show') }} {{ trans('global.profile') }}
        @else
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        @endif
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>

                        @else
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>


                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>

                        @else
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>


                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>


                        @else
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>


                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ $user->gender }}
                        </td>


                        @else
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ $user->gender }}
                        </td>


                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <td>
                            {{ $user->age }}
                        </td>


                        @else
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <td>
                            {{ $user->age }}
                        </td>


                        @endif
                    </tr>
                    @if(Session::get('role') != '2')
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>


                        @else
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>


                        @endif
                    </tr>
                        <tr>
                            @if(app()->getLocale() == 'ar')
                            <th>
                                الأدوار
                            </th>
                            <td>
                                @foreach($user->roles as $id => $roles)
                                    <span class="label label-info label-many">{{ $roles->title }}</span>
                                @endforeach
                            </td>


                            @else
                            <th>
                                Roles
                            </th>
                            <td>
                                @foreach($user->roles as $id => $roles)
                                    <span class="label label-info label-many">{{ $roles->title }}</span>
                                @endforeach
                            </td>


                            @endif
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
            @if(app()->getLocale() == 'ar')
            <a style="margin-top:20px;margin-right:45%;margin-left:5%" class="btn btn-danger" href="{{ url()->previous() }}">
                {{ trans('global.back') }}
            </a>
            @else
            <a style="margin-top:20px;margin-left:40%" class="btn btn-danger" href="{{ url()->previous() }}">
                {{ trans('global.back') }}
            </a>
            @endif
            @can('user_edit')
            <a style="margin-top:20px;margin-left:10%;height:10%" class="btn btn-info" href="{{ route('admin.users.edit',Session::get('user_id')) }}">
                {{ trans('global.edit') }}
            </a>
            @endcan
        </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Appointment">
            <thead>
                <tr>
                    @if (app()->getLocale() == 'ar')
                    <th width="10">

                    </th>
                    @else
                    <th>
                        Acions
                    </th>
                    @endif
                    <th>
                        {{ trans('cruds.appointment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.client') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.finish_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.comments') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.services') }}
                    </th>
                    @if (app()->getLocale() == 'en')
                    <th width="10">

                    </th>
                    @else
                    <th>
                        العمليات
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
    </div>
</div>

@section('scripts')

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
    ajax: "{{ route('admin.appointments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'client_name', name: 'client.name' },
{ data: 'employee_name', name: 'employee.name' },
{ data: 'start_time', name: 'start_time' },
{ data: 'finish_time', name: 'finish_time' },
{ data: 'price', name: 'price' },
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

@if (Session::has('profileupdated'))
<script>
Swal.fire(
  'Success',
  'Profile updated.',
  'success'
);
</script>
{{Session::forget('profileupdated')}}
@endif

@endsection
