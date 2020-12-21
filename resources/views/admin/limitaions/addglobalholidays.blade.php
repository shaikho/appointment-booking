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
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@parent
@endsection
