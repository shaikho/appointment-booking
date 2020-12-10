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

        if(Session::get('role') == 2){
            $appointments = Appointment::with(['client', 'employee'])->where('client_id',Session::get('user_id'))->get();
        }else{
            $appointments = Appointment::with(['client', 'employee'])->get();
            dd($appointments);
        }

        foreach ($appointments as $appointment) {
            if (!$appointment->start_time) {
                continue;
            }

            $events[] = [
                'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                'start' => $appointment->start_time,
                'url'   => route('admin.appointments.edit', $appointment->id),
            ];
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
