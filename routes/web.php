<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "barbershopController@index")->name("index");
Route::get('/add', "barbershopController@view_add")->name("view_add");
Route::get('/view/{id}', "barbershopController@view_edit")->name("view_edit");
Route::post('/add', "barbershopController@add")->name("add");
Route::patch('/item/{id}', "barbershopController@edit")->name("edit");
Route::delete('/item/{id}', "barbershopController@delete")->name("delete");

// Route::get('/', function () {
//     return view('welcome');
// });
