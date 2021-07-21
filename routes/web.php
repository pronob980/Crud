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


Route::get('/', function (){
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/crud', 'CrudController@index')->name('crud');
Route::post('/crud/create','CrudController@store')->name('store');
Route::patch('crud/update/{crud}','CrudController@update')->name('update');
Route::delete('crud/delete/{crud}','CrudController@delete')->name('delete');