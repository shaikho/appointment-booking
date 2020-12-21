@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.limiations.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table id="example" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Service">
            <thead>
                <tr>
                    <th width="10">
                    </th>
                    <th>
                        {{ trans('cruds.limiations.fields.limitaion') }}
                    </th>
                    <th>
                        {{ trans('cruds.limiations.fields.limit') }}
                    </th>
                    <th>
                        {{ trans('global.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($limitaions as $limitaion)
                @if($limitaion->id != 4)
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
                        @can('limitations_edit')
                            <a class="btn btn-small btn-primary" href="{{ route('admin.editlimitaions',$limitaion->id) }}">
                            {{ trans('global.edit') }} {{ trans('cruds.limiations.fields.limitaion') }}
                            </a>
                        @endcan
                    </td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td>
                    </td>
                    <td>
                        Global holidays
                    </td>
                    <td>
                        @foreach($holidays as $date)
                        <span class="badge badge-info">{{ $date->date }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('limitations_edit')
                            <a class="btn btn-small btn-primary" href="{{ route('admin.addglobalholidays') }}">
                            {{ trans('global.edit') }} {{ trans('cruds.limiations.fields.limitaion') }}
                            </a>
                        @endcan
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
