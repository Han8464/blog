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
Route::get('/create', 'AdminController@show_create');
Route::post('/create', 'AdminController@create');
Route::get('/post','ArticleController@show_list');
Route::get('/post/{id}', 'ArticleController@show_content');