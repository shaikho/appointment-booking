@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.edit') }} {{ trans('cruds.limiations.title_singular') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updatelimitaions') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label style="font-weight:500" for="start_time">{{ trans('global.globalholiday') }}*</label>
                            <input type="text" id="date" name="date" class="form-control datetime2" required>
                            <br>
                            <input style="margin-left:47.5%;background-color:#7FC6A6;border-background:#7FC6A6"
                                class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                            <input style="visibility:hidden" type="text" id="id" name="id" value="4">
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        {{ trans('global.edit') }} {{ trans('cruds.limiations.title_singular') }}
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Holiday date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($holidays as $holiday)
                                <tr>
                                    <td>{{ $holiday->id }}</td>
                                    <td>{{ $holiday->date }}</td>
                                    <td>
                                        <form action="{{ route('admin.deleteholiday', $holiday->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
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

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
@parent
@endsection
