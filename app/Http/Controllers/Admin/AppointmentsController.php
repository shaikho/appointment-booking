<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Client;
use App\Employee;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Session;
use App\Limitaion;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Mail;

class AppointmentsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(Session::get('role') == '2'){
                $query = Appointment::with(['client', 'employee', 'services'])
                                    ->select(sprintf('%s.*', (new Appointment)->table))
                                    ->where('client_id','=',Session::get('user_id'))
                                    ->get();
            }else{
                $query = Appointment::with(['client', 'employee', 'services'])
                                    ->select(sprintf('%s.*', (new Appointment)->table))
                                    ->where('client_id','=',Session::get('filter_id'))
                                    ->get();
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'appointment_show';
                $editGate      = 'appointment_edit';
                $deleteGate    = 'appointment_delete';
                $approveGate   = 'approve_appointments';
                $declineGate   = 'decline_appointments';
                $crudRoutePart = 'appointments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'approveGate',
                    'declineGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : "";
            });
            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'employee', 'services']);

            return $table->make(true);
        }

        return view('admin.appointments.index');
    }

    public function allappointments(Request $request)
    {
        if ($request->ajax()) {
            $query = Appointment::with(['client', 'employee', 'services'])
                                ->select(sprintf('%s.*', (new Appointment)->table));


            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'appointment_show';
                $editGate      = 'appointment_edit';
                $deleteGate    = 'appointment_delete';
                $approveGate   = 'approve_appointments';
                $declineGate   = 'decline_appointments';
                $crudRoutePart = 'appointments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'approveGate',
                    'declineGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : "";
            });
            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'employee', 'services']);

            return $table->make(true);
        }

        return view('admin.appointments.index');
    }

    public function draftedappointments(Request $request)
    {
        if ($request->ajax()) {
            if(Session::get('role') == '2'){
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('client_id','=',Session::get('user_id'))
                ->where('status','D')
                ->get();
            }else{
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('status','D')
                ->get();
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'appointment_show';
                $editGate      = 'appointment_edit';
                $deleteGate    = 'appointment_delete';
                $submitGate    = 'submit_appointments';
                $approveGate   = 'approve_appointments';
                $declineGate   = 'decline_appointments';
                $crudRoutePart = 'appointments';

                return view('partials.datatablesAppointmentsActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'submitGate',
                    'approveGate',
                    'declineGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : "";
            });
            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'employee', 'services']);

            return $table->make(true);
        }

        return view('admin.appointments.draftedappointments');
    }

    public function pendingappointments(Request $request)
    {
        if ($request->ajax()) {
            if(Session::get('role') == '2'){
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('client_id','=',Session::get('user_id'))
                ->where('status','P')
                ->get();
            }else{
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('status','P')
                ->get();
            }


            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'appointment_show';
                $editGate      = 'appointment_edit';
                $deleteGate    = 'appointment_delete';
                $submitGate    = 'submit_appointments';
                $approveGate   = 'approve_appointments';
                $declineGate   = 'decline_appointments';
                $crudRoutePart = 'appointments';

                return view('partials.datatablesAppointmentsActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'submitGate',
                    'approveGate',
                    'declineGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : "";
            });
            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'employee', 'services']);

            return $table->make(true);
        }

        return view('admin.appointments.pendingappointments');
    }

    public function approvedappointments(Request $request)
    {
        if ($request->ajax()) {
            if(Session::get('role') == '2'){
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('client_id','=',Session::get('user_id'))
                ->where('status','A')
                ->get();
            }else{
                $query = Appointment::with(['client', 'employee', 'services'])
                ->select(sprintf('%s.*', (new Appointment)->table))
                ->where('status','A')
                ->get();
            }


            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'appointment_show';
                $editGate      = 'appointment_edit';
                $deleteGate    = 'appointment_delete';
                $submitGate    = 'submit_appointments';
                $approveGate   = 'approve_appointments';
                $declineGate   = 'decline_appointments';
                $crudRoutePart = 'appointments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'submitGate',
                    'approveGate',
                    'declineGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : "";
            });
            $table->editColumn('services', function ($row) {
                $labels = [];

                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'employee', 'services']);

            return $table->make(true);
        }

        return view('admin.appointments.approvedappointments');
    }

    public function submit($id){

        $message = 'N/A';
        //get daily limitaion
        $dailylimit = Limitaion::find(2);
        $dailylimit = $dailylimit->limit;

        //get duration limitaion
        $durationlimit = Limitaion::find(3);
        $durationlimit = $durationlimit->limit;

        //to count up to day limit
        $counter=0;

        //get specific appointment
        $appointment = Appointment::find($id);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $appointment->finish_time);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $appointment->start_time);
        $appointmenthours = $to->diffInHours($from);

        if($appointmenthours > $durationlimit){
            Session::put('hourslimitviolated','Hours limit violated');
            return view('admin.appointments.draftedappointments');
        }

        $datetocompare = $appointment->start_time;

        $completeappointments = Appointment::All()->where('status','<>','D');
        foreach ($completeappointments as $singleappointment){
            $date = $singleappointment->start_time->format('Y/m/d');
            if($datetocompare == $date){
                $counter = $counter + 1;
            }
        }

        if($counter < $dailylimit){
            $appointment->status = 'P';
            $appointment->save();
            $message = 'Appointment submitted.';
            Session::put('success','Appointment submitted.');
        }else{
            $message = 'Sorry picked date ('.$datetocompare.') is fully booked.';
            Session::put('datelimitfail','Sorry picked date ('.$datetocompare.') is fully booked.');
        }

        return view('admin.appointments.draftedappointments');
    }

    public function approve($id){

        //approving the appointment
        $appointment = Appointment::find($id);
        $appointment->status = 'A';
        $appointment->save();

        //email customer the qr code and confirmation
        $department = Employee::find($appointment->employee_id);
        $qrCode = new QrCode('http://127.0.0.1:8000/admin/appointments/'.$id);
		$qrCode->setSize(300);
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setWriterByName('png');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$qrCode->setLogoSize(150, 200);
		$qrCode->setValidateResult(false);
		$qrCode->setRoundBlockSize(true);
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
		header('Content-Type: '.$qrCode->getContentType());
        $qrCode->writeFile(public_path('/qrcode.png'));

        $details = [
            'title' => 'From Appointment booking',
            'image' => 1,
            'body' => 'Your appointment with '.$department->name.' department is approved for '. $appointment->start_time . ',
            Please contact the department for further inquerys on '.$department->phone.' .
            find below your QRCode.'
        ];

        $user = User::find($appointment->client_id);

        Mail::to($user->email)->send(new \App\Mail\MailTest($details));

        return view('admin.appointments.pendingappointments');
    }

    public function decline($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'D';
        $appointment->save();
        return view('admin.appointments.pendingappointments');
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::all()->pluck('name', 'id');

        return view('admin.appointments.create', compact('clients', 'employees', 'services'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $message = 'N/A';
        //get daily limitaion
        $dailylimit = Limitaion::find(2);
        $dailylimit = $dailylimit->limit;

        //get duration limitaion
        $durationlimit = Limitaion::find(3);
        $durationlimit = $durationlimit->limit;

        //to count up to day limit
        $counter=0;

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s', $request->finish_time);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s', $request->start_time);
        $appointmenthours = $to->diffInHours($from);

        if($appointmenthours > $durationlimit){
            Session::put('hourslimitviolated','Hours limit violated');
            return view('admin.appointments.draftedappointments');
        }

        $datetocompare = $request->start_time;

        $completeappointments = Appointment::All()->where('status','<>','D');
        foreach ($completeappointments as $singleappointment){
            $date = $singleappointment->start_time->format('Y/m/d');
            if($datetocompare == $date){
                $counter = $counter + 1;
            }
        }

        if($counter < $dailylimit){
            Session::put('created','Appointment created.');
        }else{
            Session::put('datelimitfail','Sorry picked date is fully booked.');
        }


        $appointment = Appointment::create($request->all());
        if(Session::get('role') != '2'){
            $appointment->status = 'A';
            $appointment->save();
        }
        $appointment->services()->sync($request->input('services', []));

        if(Session::get('role') == '2'){
            return redirect()->route('admin.draftedappointments');
        }

        return redirect()->route('admin.pendingappointments');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::all()->pluck('name', 'id');

        $appointment->load('client', 'employee', 'services');

        return view('admin.appointments.edit', compact('clients', 'employees', 'services', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        $appointment->services()->sync($request->input('services', []));

        if(Session::get('role') == '2'){
            return redirect()->route('admin.draftedappointments');
        }else {

            //email customer the qr code and confirmation
            $department = Employee::find($appointment->employee_id);
            $qrCode = new QrCode('http://127.0.0.1:8000/admin/appointments/'.$appointment->id);
            $qrCode->setSize(300);
            $qrCode->setMargin(10);
            $qrCode->setEncoding('UTF-8');
            $qrCode->setWriterByName('png');
            $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
            $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
            $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
            $qrCode->setLogoSize(150, 200);
            $qrCode->setValidateResult(false);
            $qrCode->setRoundBlockSize(true);
            $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
            header('Content-Type: '.$qrCode->getContentType());
            $qrCode->writeFile(public_path('/qrcode.png'));

            $details = [
                'title' => trans('global.emailsentfrom'),
                'image' => 0,
                'body' => 'Your appointment with '.$department->name.' department has been modified to start from '. $appointment->start_time . ' and end on '.$appointment->finish_time.',
                Please click the link below to approve the update and recive your QRcode. for further inquerys on '.$department->phone.' .



                http://127.0.0.1:8000/admin/approve/'.$appointment->id
            ];

            $user = User::find($appointment->client_id);

            Mail::to($user->email)->send(new \App\Mail\MailTest($details));
            Session::put('emailsenttoclient','emailsent');

            return redirect()->route('admin.pendingappointments');
        }
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('client', 'employee', 'services');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
