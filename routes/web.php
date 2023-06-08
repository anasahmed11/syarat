<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);
Route::group(["middleware" => ["auth"],'namespace'=>'Admin'],function(){
    Route::get('/home', 'TaskController@index')->name('dashboard');
    /* ------------- departments ---------------*/
    Route::get('/departments', 'DepartmentController@index')->name('departments');
    Route::post('department', 'DepartmentController@store');
    Route::post('department/{id}', 'DepartmentController@update');
    Route::post('department-delete/{id}', 'DepartmentController@destroy');
    /* ------------- employees ---------------*/
    Route::get('/employees', 'EmployeeController@index')->name('employees');
    Route::post('employee', 'EmployeeController@store');
    Route::post('employee/{id}', 'EmployeeController@update');
    Route::post('employee-delete/{id}', 'EmployeeController@destroy');
    /* ------------- tasks ---------------*/
    Route::get('/tasks', 'TaskController@index')->name('tasks');
    Route::post('task', 'TaskController@store');
    Route::post('task/{id}', 'TaskController@update');
});
