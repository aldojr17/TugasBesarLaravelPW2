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

Route::get('/', 'AuthController@login')->name('login');
Route::post('/', 'AuthController@postlogin');
Route::get('/register', 'AuthController@reg');
Route::post('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');

Route::get('/home', function (){
    return view('pages.home');
})->middleware('auth');

//Route::get('/category', 'CategoryController@index');
//Route::post('/category', 'CategoryController@store');
//Route::delete('/category/{category}', 'CategoryController@destroy');
//Route::get('/category/{category}/edit', 'CategoryController@edit');
//Route::patch('/category/{category}', 'CategoryController@update');

Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('book', 'BookController')->middleware('auth');
