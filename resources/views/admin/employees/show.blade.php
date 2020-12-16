@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $employee->id }}
                        </td>
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        @else
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        <td>
                            {{ $employee->id }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $employee->name }}
                        </td>
                        <th>
                            {{ trans('cruds.employee.fields.name') }}
                        </th>
                        @else
                        <th>
                            {{ trans('cruds.employee.fields.name') }}
                        </th>
                        <td>
                            {{ $employee->name }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $employee->email }}
                        </td>
                        <th>
                            {{ trans('cruds.employee.fields.email') }}
                        </th>
                        @else
                        <th>
                            {{ trans('cruds.employee.fields.email') }}
                        </th>
                        <td>
                            {{ $employee->email }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $employee->phone }}
                        </td>
                        <th>
                            {{ trans('cruds.employee.fields.phone') }}
                        </th>
                        @else
                        <th>
                            {{ trans('cruds.employee.fields.phone') }}
                        </th>
                        <td>
                            {{ $employee->phone }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            @foreach($employee->services as $id => $services)
                                <span class="label label-info label-many">{{ $services->name }}</span>
                            @endforeach
                        </td>
                        <th>
                            {{ trans('global.services') }}
                        </th>

                        @else
                        <td>
                            @foreach($employee->services as $id => $services)
                                <span class="label label-info label-many">{{ $services->name }}</span>
                            @endforeach
                        </td>
                        <th>
                            {{ trans('global.services') }}
                        </th>
                        @endif
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
