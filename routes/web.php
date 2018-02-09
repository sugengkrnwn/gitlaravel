<?php

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

Route::get('/lomba','LombaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function(){ // perlu auth/login untuk bisa login ke halaman di dalam
    Route::get('lomba','LombaController@index');
    //add
    Route::get('lomba/add','LombaController@add');
    Route::post('lomba','LombaController@create');
    //edit
    Route::get('lomba/{id}/edit','LombaController@edit');
    Route::post('lomba/{id}/edit','LombaController@update');
    //delete
    Route::get('lomba/{id}/hapus','LombaController@delete');
    Route::get('lomba/{id}/confirmdelete','LombaController@deleteConfirm');
});
Route::get('lomba/{id}','LombaController@detail');

Route::get('/dashboard', function(){
        return view('/dashboard');
});