<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/flowers', 'FlowerController@index')->name('flower.index');
Route::get('/flowers/create', 'FlowerController@create')->name('flower.create');
Route::post('/flowers', 'FlowerController@store')->name('flower.store');
Route::get('/flowers/{flower}', 'FlowerController@show')->name('flower.show');
Route::get('flowers/{flower}/edit', 'FlowerController@edit')->name('flower.edit');
Route::patch('flowers/{flower}', 'FlowerController@update')->name('flower.update');
Route::delete('flowers/{flower}', 'FlowerController@destroy')->name('flower.destroy');
Route::post('flowers/{flower}/images/', 'ImageController@store')->name('image.store');
Route::delete('flowers/{flower}/images/{image}', 'ImageController@destroy')->name('image.destroy');
