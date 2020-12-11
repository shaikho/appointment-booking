<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin')->name('home');
Auth::routes(['register' => false]);
// Route::post('customerlogout',function(){
//     return view('customerlogin');
// })->name('customerlogout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    Route::post('register','UsersController@register')->name('register');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/media', 'EmployeesController@storeMedia')->name('employees.storeMedia');
    Route::resource('employees', 'EmployeesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Appointments
    Route::delete('appointments/destroy', 'AppointmentsController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentsController');
    Route::get('draftedappointments','AppointmentsController@draftedappointments')->name('pendingappointments');
    Route::get('pendingappointments','AppointmentsController@pendingappointments')->name('pendingappointments');
    Route::get('approvedappointments','AppointmentsController@approvedappointments')->name('approvedappointments');
    Route::post('approve/{id}','AppointmentsController@approve')->name('approve');
    Route::post('decline/{id}','AppointmentsController@decline')->name('decline');

    // Calender
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    // Custome

});

// Customer login

Route::get('customerlogin',function (){
    return view('customerlogin');
})->name('customerlogin');

Route::group(['namespace' => 'Admin'], function () {

    Route::post('customerregister','UsersController@register')->name('customerregister');
    Route::get('emailverification/{id}','UsersController@verifyemail')->name('emailverification');

});

Route::get('send-mail', function () {

    $details = [
        'title' => 'E-mail verification',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('alshak.diya@hotmail.com')->send(new \App\Mail\MailTest($details));

    dd("Email is Sent.");
});
