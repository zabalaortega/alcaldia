<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//login
Route::resource('register', 'RegisterController', ['except' => ['destroy', 'show', 'create', 'edit']]);

//Dependencias
Route::resource('dependencias', 'DependenciaController', ['except' => ['destroy', 'show', 'create', 'edit']]);

//Multimedias
Route::resource('multimedias', 'MultimediaController', ['except' => ['destroy', 'show', 'create', 'edit']]);
Route::post('multimedias/change', 'MultimediaController@changeStatus')->name('multimedias.change');

//Solicitudes
Route::resource('solicitud_equipos_multimedias', 'PrestamoController', ['except' => ['destroy', 'show', 'edit']]);
Route::post('prestamos/change', 'PrestamoController@changeUpdate')->name('prestamos.update');
Route::get('prestamos/devolver/{id}', 'PrestamoController@devolverMultimedia')->name('prestamos.devolver');
Route::get('export/excel', 'PrestamoController@export')->name('export');

//usuarios
Route::resource('usuarios', 'UsuarioController', ['except' => ['destroy', 'show', 'create', 'edit']]);



Route::get('multimedias/avaliable', 'PrestamoController@getMultimedias')->name('multimedias.avaliable');




