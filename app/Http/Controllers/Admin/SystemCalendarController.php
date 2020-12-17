<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Limitaion;
use App\Http\Controllers\Controller;
use Session;

class SystemCalendarController extends Controller
{

    public function index()
    {
        $events = [];
        $myevents = [];
        $othersevents = [];

        $myappointments = Appointment::with(['client', 'employee'])
                                      ->where('status','<>','D')
                                      ->where('client_id',Session::get('user_id'))
                                      ->get();

        $othersappointments = Appointment::with(['client', 'employee'])
                                          ->where('status','<>','D')
                                          ->where('client_id','!=',Session::get('user_id'))
                                          ->get();

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

                if(Session::get('role') == '4'){
                    $myevents[] = [
                        'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                        'start' => $appointment->start_time,
                        'url'   => route('admin.appointments.show', $appointment->id),
                    ];
                }else{
                    $myevents[] = [
                        'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                        'start' => $appointment->start_time,
                        'url'   => route('admin.appointments.edit', $appointment->id),
                    ];
                }

            }
        }else{
            foreach ($othersappointments as $appointment) {
                if (!$appointment->start_time) {
                    continue;
                }

                if(Session::get('role') == '4'){
                    $othersevents[] = [
                        'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                        'start' => $appointment->start_time,
                        'url'   => route('admin.appointments.show', $appointment->id),
                    ];
                }else{
                    $othersevents[] = [
                        'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                        'start' => $appointment->start_time,
                        'url'   => route('admin.appointments.edit', $appointment->id),
                    ];
                }
            }
    }

        $limitaion = Limitaion::find(1);
        $offdays = $limitaion->limit;

        return view('admin.calendar.calendar', compact('myevents','othersevents','offdays'));
    }
}
