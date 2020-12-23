<?php

Route::redirect('/', '/login')->name('login');
Route::redirect('/home', '/admin')->name('home');
Auth::routes(['register' => false]);

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
    Route::get('allappointments','AppointmentsController@allappointments')->name('allappointments');
    Route::get('draftedappointments','AppointmentsController@draftedappointments')->name('draftedappointments');
    Route::get('pendingappointments','AppointmentsController@pendingappointments')->name('pendingappointments');
    Route::get('approvedappointments','AppointmentsController@approvedappointments')->name('approvedappointments');
    Route::get('receiptionappointments','AppointmentsController@receiptionappointments')->name('receiptionappointments');
    Route::post('submit/{id}','AppointmentsController@submit')->name('submit');
    Route::post('approve/{id}','AppointmentsController@approve')->name('approve');
    Route::get('approve/{id}','AppointmentsController@approve')->name('approve');
    Route::post('decline/{id}','AppointmentsController@decline')->name('decline');

    // Calender
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    // Limitaions
    Route::get('limitaions','LimitaionsController@index')->name('limitaions');
    Route::get('editlimitaions/{id}','LimitaionsController@edit')->name('editlimitaions');
    Route::get('addglobalholidays','LimitaionsController@addglobalholidays')->name('addglobalholidays');
    Route::post('updatelimitaions','LimitaionsController@update')->name('updatelimitaions');
    Route::put('updatelimitaions','LimitaionsController@update')->name('updatelimitaions');
    Route::delete('deleteholiday/{id}','LimitaionsController@deleteholiday')->name('deleteholiday');

});

Route::get('forgotpassword',function (){
    App::setLocale(app()->getLocale());
    return view('forgotpassword');
})->name('forgotpassword');

Route::get('setlocalar', function() {
    App::setLocale('ar');
    Session::put('language','ar');
    return view('auth.login');
});

Route::get('setlocalen', function() {
    App::setLocale('en');
    Session::put('language','en');
    return view('auth.login');
});


Route::group(['namespace' => 'Admin'], function () {

    Route::post('customerregister','UsersController@register')->name('customerregister');
    Route::get('changepassword/{id}','UsersController@changepassword')->name('changepassword');
    Route::post('updatepassword','UsersController@updatepassword')->name('updatepassword');
    Route::get('emailverification/{id}','UsersController@verifyemail')->name('emailverification');
    Route::post('resetpassword','UsersController@resetpassword')->name('resetpassword');

});

Route::post('adddate','LimitaionsController@adddate')->name('adddate');
