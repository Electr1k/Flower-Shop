<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Flower'], function (){
    Route::get('/flowers', 'IndexController')->name('flower.index');
    Route::get('/flowers/create', 'CreateController')->name('flower.create');
    Route::post('/flowers', 'StoreController')->name('flower.store');
    Route::get('/flowers/{flower}', 'ShowController')->name('flower.show');
    Route::get('flowers/{flower}/edit', 'EditController')->name('flower.edit');
    Route::patch('flowers/{flower}', 'UpdateController')->name('flower.update');
    Route::delete('flowers/{flower}', 'DestroyController')->name('flower.destroy');
});

Route::group(['namespace' => 'Image'], function () {
    Route::post('flowers/{flower}/images/', 'StoreController')->name('image.store');
    Route::delete('flowers/{flower}/images/{image}', 'DestroyController')->name('image.destroy');
});
