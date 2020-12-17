@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')
<style>
    .fc-sat {

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

    <script>
      $(document).ready(function () {
        // page is now ready, initialize the calendar...
        offdays = {!! json_encode($offdays) !!};
        var array = JSON.parse(offdays);
        myevents ={!! json_encode($myevents) !!};
        othersevents ={!! json_encode($othersevents) !!};
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            //   events: myevents,othersevents,
            eventSources: [
                myevents
                ,othersevents
            ],
            hiddenDays: array,
            validRange: {
                start: '2020-12-21',
                end: '2020-12-25'
            },
            // hiddenDays: [ 0,1,2,3,4,5,6,7 ],
            // weekends:false,
            defaultView: 'agendaWeek',
            dayClick: function(date, jsEvent, view) {
                var ajandamodu=view.name;
                if(ajandamodu=='month')
                {
                    $('#calendar').fullCalendar( 'changeView', 'basicDay'  );
                }
            },
        })
    })
    </script>
@stop
