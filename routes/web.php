<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/canals', 'CanalsController@index')->name('canals');
Route::post('/canals/afegir', 'CanalsController@store')->name('canals-afegir');
Route::get('/graelles', 'GraellesController@index')->name('graelles');
Route::post('/graelles/afegir', 'GraellesController@store')->name('graelles-afegir');
Route::get('/programes', 'ProgramesController@index')->name('programes');
Route::post('/programes/afegir', 'ProgramesController@store')->name('programes-afegir');
