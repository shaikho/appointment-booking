<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DebugBar;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;
use Carbon;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $validatedrequest = $request->validate([
            'email' => 'unique:users'
        ]);


        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function register(Request $request){
        $validatedrequest = $request->validate([
            'email' => 'unique:users'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            Session::put('success', 'Success!');
        }else{
            Session::put('fail', 'Failed!');
        }

        DB::table('role_user')->insert(
            ['user_id' => $user->id, 'role_id' => 2]
        );

        $encrypted = Crypt::encryptString($user->id);
        $details = [
            'title' => 'Mail from Appointment booking',
            'body' => 'Verify your account by clicking the following link

                       http://127.0.0.1:8000/emailverification/'.$encrypted
        ];

        Mail::to('alshak.diya@hotmail.com')->send(new \App\Mail\MailTest($details));

        return redirect()->route('customerlogin');
    }

    public function verifyemail($id){
        $decrypted = Crypt::decryptString($id);
        $user = User::find($decrypted);
        $datetimenow = Carbon\Carbon::now();
        $user->email_verified_at = $datetimenow->toDateTimeString();
        $user->save();
        Session::put('emailverification', 'Success!');
        return redirect()->route('customerlogin');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
