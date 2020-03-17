<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dependencias', 'DependenciaController', ['except' => [
    'destroy', 'show', 'create', 'edit'
]]);

Route::resource('empleados', 'EmpleadoController', ['except' => [
    'destroy', 'show', 'create', 'edit'
]]);
