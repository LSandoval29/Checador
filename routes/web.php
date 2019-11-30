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
Route::get('/projects/', 'projectController@index')->name('project');
Route::get('/proyecto/{id}', 'projectController@show')->name('proyecto');
Route::post('/proyecto', 'ProjectController@store')->name('proyecto');
Route::put('/proyecto/', 'projectController@update')->name('proyecto');
Route::delete('/proyecto/{id}', 'ProjectController@destroy');



