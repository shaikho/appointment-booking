@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.service.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $service->id }}
                        </td>
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>

                        @else
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>
                        <td>
                            {{ $service->id }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                        <td>
                            {{ $service->name }}
                        </td>
                        <th>
                            {{ trans('cruds.service.fields.name') }}
                        </th>

                        @else
                        <th>
                            {{ trans('cruds.service.fields.name') }}
                        </th>
                        <td>
                            {{ $service->name }}
                        </td>
                        @endif
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.service.fields.price') }}
                        </th>
                        <td>
                            ${{ $service->price }}
                        </td>
                    </tr> --}}
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
