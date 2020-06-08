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


//Route::get('/users', 'UserController@index');
//Route::get('/register', 'UserController@create');
//Route::post('/users', 'UserController@store');
//Route::get('/users/{id}', 'UserController@show');
//Route::get('/users/{id}/edit', 'UserController@edit');
//Route::put('/users/{id}', 'UserController@update');
//Route::delete('/users/{id}', 'UserController@destroy');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles', 'ArticleController@store');
Route::get('/articles/{id}', 'ArticleController@show');
Route::get('/articles/{id}/edit', 'ArticleController@edit');
Route::put('/articles/{id}', 'ArticleController@update');
Route::delete('/articles/{id}', 'ArticleController@destroy');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
