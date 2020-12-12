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
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
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
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ $user->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <td>
                            {{ $user->age }}
                        </td>
                    </tr>
                    @if(Session::get('role') != '2')
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                        <tr>
                            <th>
                                Roles
                            </th>
                            <td>
                                @foreach($user->roles as $id => $roles)
                                    <span class="label label-info label-many">{{ $roles->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
            <a style="margin-top:20px;margin-left:40%" class="btn btn-danger" href="{{ url()->previous() }}">
                {{ trans('global.back') }}
            </a>
            @can('user_edit')
            <a style="margin-top:20px;margin-left:10%;height:10%" class="btn btn-info" href="{{ route('admin.users.edit',Session::get('user_id')) }}">
                {{ trans('global.edit') }}
            </a>
            @endcan
        </div>
        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-header">
        {{ trans('cruds.appointment.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table id="example" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Service">
            <thead>
                <tr>
                    <th width="10">
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.finish_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.comments') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.employee') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>
                    </td>
                    <td>
                        {{ $limitaion->limitation }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                    <td>
                        {{ $limitaion->limit }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script> --}}

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
