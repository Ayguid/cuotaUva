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



// Route::get('home', function () {
//     return view('home');
// });
// Route::post('/save', 'CuotasModelController@save');


Auth::routes();


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
  return view('home');})->middleware('auth');



Route::get('/', 'HomeController@index')->name('home');



Route::get('/valoresHistoricos', function(){return view ('valoresHistoricos');})->name('valoresHistoricos');
Route::get('/valoresHistoricos/filtrados', 'HomeController@valoresHistoricos');


Route::get('/tusCreditos', 'CreditosController@tusCreditos')->name('tusCreditos');

Route::post('/tusCreditos', 'CreditosController@store');

Route::get('/creditoInfo/{id}', 'CreditosController@llevameAlCredito')->name('creditoInfo');
Route::post('/creditoUpdate/{id}', 'CreditosController@update')->name('creditoUpdate');
Route::post('/creditoBorrar/{id}', 'CreditosController@borrar')->name('creditoBorrar');




//admin routes
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
