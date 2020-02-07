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

// Iklan Route

Route::get('/api/iklan', 'Ads@index');
Route::get('/api/iklan/{id}', 'Ads@show');
Route::get('/api/iklan/delete/{id}', 'Ads@destroy');
Route::post('/api/iklan/edit/{id}', 'Ads@update');
Route::post('/api/iklan/add', 'Ads@store');


// Product Route

Route::get('/api/product', 'ProductController@index');
Route::get('/api/product/{id}', 'ProductController@show');
Route::get('/api/product/delete/{id}', 'ProductController@destroy');
Route::post('/api/product/edit/{id}', 'ProductController@update');
Route::post('/api/product/add', 'ProductController@store');
