@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            {{--  Home  --}}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
