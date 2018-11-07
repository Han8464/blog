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
    return redirect('/post');
});
Route::prefix('admin')->group(function (){

    Route::get('/login', 'AdminController@show_login');
    Route::post('/login', 'AdminController@login');

    Route::middleware('auth')->group(function (){

        Route::prefix('post')->group(function (){
            Route::get('/create', 'AdminController@show_create');
            Route::post('/create', 'AdminController@create');
        });
        Route::get('/logout', 'AdminController@logout');
        Route::post('/delete/{id}', 'AdminController@delete');
        Route::post('/update/{id}', 'AdminController@update');
        Route::post('/update_save/{id}', 'AdminController@update_save' );
        Route::get('/list', 'AdminController@show_list');
        Route::get('/', function (){
            return redirect('/admin/list');
        });
        Route::get('/editCategory', 'AdminController@show_edit_category');
        Route::get('/editTag', 'AdminController@show_edit_tag');
        Route::post('/addCategory', 'AdminController@add_category');
        Route::post('/delete_category/{id}', 'AdminController@delete_category');
        Route::post('/update_category/{id}', 'AdminController@update_category');
        Route::post('/addTag', 'AdminController@add_tag');
        Route::post('/delete_tag/{id}', 'AdminController@delete_tag');
        Route::post('/update_tag/{id}', 'AdminController@update_tag');
    });


});


Route::get('/post','ArticleController@show_list');
Route::get('/post/{id}', 'ArticleController@show_content');