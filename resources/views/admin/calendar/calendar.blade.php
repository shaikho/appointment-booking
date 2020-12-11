@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')
<style>
    .fc-time {
        /* font-size: 30px; */
    }
</style>
    @can('appointment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.appointments.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
    <div class="card">
        <div class="card-header">
            {{ trans('global.systemCalendar') }}
        </div>
        <div class="card-body">
            <link rel='stylesheet'
                  href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
            <div id='calendar'></div>
        </div>
    </div>
@endsection

@section('scripts')
@parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    @if(Session::get('role') == '2'){
        <script>
            $(document).ready(function () {
              // page is now ready, initialize the calendar...
              myevents ={!! json_encode($myevents) !!};
              othersevents ={!! json_encode($othersevents) !!};
              $('#calendar').fullCalendar({
                  // put your options and callbacks here
                  //   events: myevents,othersevents,
                  eventSources: [
                      myevents
                      ,othersevents
                  ],
                  defaultView: 'agendaWeek'
              })
          })
          </script>
    }@else{
        <script>
            $(document).ready(function () {
              // page is now ready, initialize the calendar...
            //   myevents ={!! json_encode($myevents) !!};
              othersevents ={!! json_encode($othersevents) !!};
              $('#calendar').fullCalendar({
                  // put your options and callbacks here
                  events: othersevents,
                  defaultView: 'agendaWeek'
              })
          })
          </script>
    }
    @endif

@stop
