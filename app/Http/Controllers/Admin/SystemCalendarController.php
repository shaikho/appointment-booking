<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use Session;

class SystemCalendarController extends Controller
{

    public function index()
    {
        $events = [];
        $myevents = [];

        // if(Session::get('role') == 2){
        //     $appointments = Appointment::with(['client', 'employee'])->where('client_id',Session::get('user_id'))->get();
        // }else{
        //     $appointments = Appointment::with(['client', 'employee'])->get();
        // }

        $myappointments = Appointment::with(['client', 'employee'])->where('client_id',Session::get('user_id'))->get();

        $othersappointments = Appointment::with(['client', 'employee'])->where('client_id','!=',Session::get('user_id'))->get();



        if(Session::get('role') == '2'){

            foreach ($othersappointments as $appointment) {
                if (!$appointment->start_time) {
                    continue;
                }

                $othersevents[] = [
                    'title' => 'RESERVED'.'('.$appointment->employee->name.')',//$appointment->client->name . ' ('.$appointment->employee->name.')',
                    'start' => $appointment->start_time,
                    'color' => 'red',
                    'textColor' => 'white',
                    // 'url'   => route('admin.appointments.edit', $appointment->id),
                ];
            }

            foreach ($myappointments as $appointment) {
                if (!$appointment->start_time) {
                    continue;
                }

                $myevents[] = [
                    'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                    'start' => $appointment->start_time,
                    'url'   => route('admin.appointments.edit', $appointment->id),
                ];
            }
        }else{
            foreach ($othersappointments as $appointment) {
                if (!$appointment->start_time) {
                    continue;
                }

                $othersevents[] = [
                    'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                    'start' => $appointment->start_time,
                    'url'   => route('admin.appointments.edit', $appointment->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('myevents','othersevents'));
    }
}
