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
//Dos formas de usar el logo del navbar para ir a INICIO...o pag principal una es de forma instantanea
//con Route::view()... y la otra forma es utilizar el controlador con Route::get()

//Route::view('/', 'home')->name('home');

//Route::get('/home/{id?}', 'miControlador@inicio')->name('home');

//Redirecciona al formulario de crearEmpleado

Route::get('/nuevoEmpleado', 'miControlador@formNuevoEmp')->name('nuevoEmpleado');
//da de alta un empleado enviando los datos del formulario
Route::post('/alta', 'miControlador@crearEmpleado')->name('crearEmp');
Route::get('/baja/{id}', 'miControlador@eliminarEmpleado')->name('eliminarEmp');


//Redirecciona al formulario de Edicion
Route::get('/editarEmpleado/{id}', 'miControlador@editarEmpleado')->name('editarEmp');
Route::put('/update/{id}', 'miControlador@update')->name('updateEmp');

Auth::routes();

Route::get('/home/{id?}', 'HomeController@index')->name('home');
Route::view('/', 'bienvenido');
