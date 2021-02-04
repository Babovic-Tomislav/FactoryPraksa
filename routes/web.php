<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['homepage:employee', 'auth']], function(){
    Route::get('/employee', 'Employee\EmployeeController@index')
        ->name('dashboard');
    Route::post('/employee/createrequest', 'VacationController@create')
        ->name('employeeVacationRequest');
});

Route::group(['middleware' => ['homepage:approver', 'auth']], function(){
    Route::get('/employee', 'Employee\ApproverController@index')
        ->name('approverHomepage');
    Route::get('/vacationrequest', 'Employee\ApproverController@vacation')
        ->name('vacationRequest');
    Route::get('/employeesvacation', 'Employee\ApproverController@vacationList')
        ->name('employeesVacationList');
});

Route::group(['middleware' => ['homepage:admin', 'auth']], function(){
    Route::get('/employee', 'Employee\AdminController@index')
        ->name('adminHomepage');
});


require __DIR__.'/auth.php';
