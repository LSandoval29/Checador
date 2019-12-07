<?php

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function(){
    return view('checador.reloj');
});

Route::get('/reloj', function(){
    return view('checador.index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DE USUARIOS:
Route::get('/users/', 'userController@index')->name('users');
Route::get('/user/{id}','UserController@show')->name('user');
Route::get('/usuario_detalle/{id}', 'UserController@detail')->name('usuario_detalle');
Route::get('/vista_previa/{id}', 'UserController@previous')->name('vista_previa');
Route::post('/user/','UserController@store')->name('user');
Route::put('/user/','UserController@update')->name('user');
Route::delete('/userdestroy/{id}', 'userController@destroy');

//RUTAS DE PROYECTOS:
Route::get('/projects/', 'projectController@index')->name('project');
Route::get('/proyecto/{id}', 'projectController@show')->name('proyecto');
Route::post('/proyecto', 'ProjectController@store')->name('proyecto');
Route::put('/proyecto/', 'projectController@update')->name('proyecto');
Route::delete('/proyecto/{id}', 'ProjectController@destroy');
Route::get('/proyecto_detalle/{id}', 'ProjectController@detail')->name('proyecto_detalle');

//RUTA DE CHECKS:
Route::post('/check', 'checkController@index')->name('/check');

Route::get('/get_segundos', 'configuracionController@getSegundos')->name('get_segundos');







