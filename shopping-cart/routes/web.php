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

Route::get('/', function () {
    return view('welcome');
});

// Categori Route
Route::get('/api/category', 'CategoryController@index');
Route::get('/api/category/{id}', 'CategoryController@show');
Route::get('/api/category/delete/{id}', 'CategoryController@destroy');
Route::post('/api/category/edit/{id}', 'CategoryController@update');
Route::post('/api/category/add', 'CategoryController@store');