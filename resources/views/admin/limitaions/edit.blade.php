@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.limiations.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.updatelimitaions") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3> {{$limitaion->limitation}}</h3>
            <input style="visibility: hidden;" type="text" name="id" id="id" value="{{$limitaion->id}}">
            <div class="form-group {{ $errors->has('limit') ? 'has-error' : '' }}">
                <label for="limi">{{ trans('cruds.limiations.fields.limit') }}*</label>
                <input type="text" id="limit" name="limit" class="form-control" value="{{ old('limitaion', isset($limitaions) ? $limitaions->limit : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.limiations.fields.name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
