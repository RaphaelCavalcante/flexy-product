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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'ProductController@allProducts');
Route::get('/create', function() {
    return view('create-product');
});

Route::post('/insert','ProductController@add');
Route::get('/update/{id}', 'ProductController@update');
Route::post('/edit/{id}', 'ProductController@edit');
Route::get('/view/{id}', 'ProductController@getProduct');
Route::delete('/delete/{id}', 'ProductController@delete'); //change of frontend