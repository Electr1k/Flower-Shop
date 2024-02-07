<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::group(['namespace' => 'Web\Flower'], function (){
//    Route::get('/flowers', 'IndexController')->name('flower.index');
//    Route::get('/flowers/create', 'CreateController')->name('flower.create');
//    Route::post('/flowers', 'StoreController')->name('flower.store');
//    Route::get('/flowers/{flower}', 'ShowController')->name('flower.show');
//    Route::get('flowers/{flower}/edit', 'EditController')->name('flower.edit');
//    Route::patch('flowers/{flower}', 'UpdateController')->name('flower.update');
//    Route::delete('flowers/{flower}', 'DestroyController')->name('flower.destroy');
//});

Route::group(['namespace' => 'Web\Image'], function () {
    Route::post('flowers/{flower}/images/', 'StoreController')->name('image.store');
    Route::delete('flowers/{flower}/images/{image}', 'DestroyController')->name('image.destroy');
});

Route::group(['namespace' => 'Web\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', "Main\IndexController")->name('admin.index');
    Route::group(['namespace' => 'Flower', 'prefix' => 'flowers'], function () {
        Route::get('/', "IndexController")->name('flower.index');
        Route::get('/create', 'CreateController')->name('flower.create');
        Route::post('/', 'StoreController')->name('flower.store');
        Route::get('/{flower}', 'ShowController')->name('flower.show');
        Route::get('/{flower}/edit', 'EditController')->name('flower.edit');
        Route::patch('/{flower}', 'UpdateController')->name('flower.update');
        Route::delete('/{flower}', 'DestroyController')->name('flower.destroy');

    });
});

Auth::routes();

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
