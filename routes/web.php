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

use Illuminate\Support\Facades\Route;

Route::get('/', 'ImagePostController@index');
Route::get('image_posts/{id}', 'ImagePostController@show');

Route::group(['middleware'=>'auth'], function () {
    Route::get('image_posts/create', 'ImagePostController@create');
    Route::get('image_posts/store', 'ImagePostController@store');
    Route::get('image_posts/edit', 'ImagePostController@edit');
    Route::get('image_posts/update/{id}', 'ImagePostController@update');
    Route::get('image_posts/destroy/{id}', 'ImagePostController@destroy');
});

//
//Route::prefix('admin')->group(['middleware'=>'auth'], function () {
//    Route::get('admin', 'AdminsController@index');
//});

