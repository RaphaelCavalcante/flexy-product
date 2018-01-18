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

//VIEW ROUTING
Route::get('/', 'ViewRouterController@allProducts');
Route::get('/create-product', 'ViewRouterController@create');
Route::get('/update/{id}', 'ViewRouterController@update');
Route::get('/view/{id}', 'ViewRouterController@getProduct');


Route::post('/insert','ProductController@add');
Route::post('/edit/{id}', 'ProductController@edit');
Route::get('/delete/{id}', 'ProductController@delete');