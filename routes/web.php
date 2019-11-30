<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DE USUARIOS:
Route::get('/users/', 'userController@index')->name('users');
Route::get('/user/{id}','UserController@show')->name('user');
Route::post('/user/','UserController@store')->name('user');
Route::put('/user/','UserController@update')->name('user');
Route::delete('/userdestroy/{id}', 'userController@destroy');

//RUTAS DE PROYECTOS:

