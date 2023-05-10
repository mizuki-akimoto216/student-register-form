<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//show list
Route::get('/', 'App\Http\Controllers\StudentController@showList')->name('students');

//show register form
Route::get('/student/create', 'App\Http\Controllers\StudentController@showCreate')->name('create');

//register
Route::post('/student/store', 'App\Http\Controllers\StudentController@exeStore')->name('store');

//Edit
Route::get('/student/edit/{id}', 'App\Http\Controllers\StudentController@showEdit')->name('edit');
Route::post('/student/update', 'App\Http\Controllers\StudentController@exeUpdate')->name('update');

//Delete
Route::post('/student/delete/{id}', 'App\Http\Controllers\StudentController@exeDelete')->name('delete');