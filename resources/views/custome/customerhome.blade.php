@extends('layouts.customer')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            {{--  {{ trans('global.login_password') }}  --}}
        </div>
    </div>
</div>

@if (Session::has('profileupdated'))
<script>
Swal.fire(
    'Success!',
    'Profile updated.',
    'success'
)
</script>
{{Session::forget('profileupdated')}}
@endif
@endsection
@section('scripts')
@parent

@endsection
