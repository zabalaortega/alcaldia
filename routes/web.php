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

Route::resource('equipos', 'EquipoController', ['except' => [
    'destroy', 'show', 'create', 'edit'
]]);

Route::resource('inventarios', 'InventarioController', ['except' => [
    'destroy', 'show', 'edit'
]]);

Route::resource('multimedias', 'MultimediaController', ['except' => [
    'destroy', 'show', 'create', 'edit'
]]);

Route::get('multimedias/{id}/{status}', 'MultimediaController@changeStatus')->name('multimedias.change');
Route::post('inventarios/stock', 'InventarioController@addSpaceStock')->name('inventarios.stock');
