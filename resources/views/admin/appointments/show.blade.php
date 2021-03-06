@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appointment.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {{ $appointment->id }}
                        </td>
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>


                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>
                        <td>
                            {{ $appointment->id }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {{ $appointment->client->name ?? '' }}
                        </td>
                        <th>
                            {{ trans('cruds.appointment.fields.client') }}
                        </th>

                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.client') }}
                        </th>
                        <td>
                            {{ $appointment->client->name ?? '' }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {{ $appointment->employee->name ?? '' }}
                        </td>
                        <th>
                            {{ trans('cruds.appointment.fields.employee') }}
                        </th>


                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.employee') }}
                        </th>
                        <td>
                            {{ $appointment->employee->name ?? '' }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {{ $appointment->start_time }}
                        </td>

                         <th>
                            {{ trans('cruds.appointment.fields.start_time') }}
                        </th>

                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.start_time') }}
                        </th>
                        <td>
                            {{ $appointment->start_time }}
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {{ $appointment->finish_time }}
                        </td>
                        <th>
                            {{ trans('cruds.appointment.fields.finish_time') }}
                        </th>



                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.finish_time') }}
                        </th>
                        <td>
                            {{ $appointment->finish_time }}
                        </td>


                        @endif
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.price') }}
                        </th>
                        <td>
                            ${{ $appointment->price }}
                        </td>
                    </tr> --}}
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            {!! $appointment->comments !!}
                        </td>
                        <th>
                            {{ trans('cruds.appointment.fields.comments') }}
                        </th>


                        @else
                        <th>
                            {{ trans('cruds.appointment.fields.comments') }}
                        </th>
                        <td>
                            {!! $appointment->comments !!}
                        </td>


                        @endif
                    </tr>
                    <tr>
                        @if(app()->getLocale() == 'ar')

                        <td>
                            @foreach($appointment->services as $id => $services)
                                <span class="label label-info label-many">{{ $services->name }}</span>
                            @endforeach
                        </td>
                        <th>
                            {{ trans('global.services') }}
                        </th>


                        @else
                        <th>
                            {{trans('global.services')}}
                        </th>
                        <td>
                            @foreach($appointment->services as $id => $services)
                                <span class="label label-info label-many">{{ $services->name }}</span>
                            @endforeach
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection
