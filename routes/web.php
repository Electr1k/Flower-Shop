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

Route::group(['namespace' => 'Web\Admin', 'prefix' => 'admin', ], function () {
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
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', "IndexController")->name('category.index');
        Route::get('/create', 'CreateController')->name('category.create');
        Route::post('/', 'StoreController')->name('category.store');
        Route::get('/{category}', 'ShowController')->name('category.show');
        Route::get('/{category}/edit', 'EditController')->name('category.edit');
        Route::patch('/{category}', 'UpdateController')->name('category.update');
        Route::delete('/{category}', 'DestroyController')->name('category.destroy');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', "IndexController")->name('tag.index');
        Route::get('/create', 'CreateController')->name('tag.create');
        Route::post('/', 'StoreController')->name('tag.store');
        Route::get('/{tag}', 'ShowController')->name('tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('tag.destroy');

    });
});

Auth::routes();

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
