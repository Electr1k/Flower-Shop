<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([
    'namespace' => 'Api\Flower',
    'middleware' => 'api',
    'prefix' => 'flowers'], function ($router){
    Route::get('/filter', 'FilterListController');
    Route::get('/all', 'IndexController');
    Route::get('/{flower}', 'ShowController');
    Route::group([
        'middleware' => ['auth:sanctum', 'admin']
    ], function () {
        Route::post('/', 'StoreController');
        Route::patch('/{flower}', 'UpdateController');
        Route::delete('/{flower}', 'DestroyController');
    });
});

Route::group([
    'namespace' => 'Api\User',
    'middleware' => 'api',
    'prefix' => 'users'], function ($router){
    Route::get('/checkEmail', 'CheckEmailController');

    Route::group(['middleware' => ['auth:sanctum']], function (){
        Route::get('/', 'IndexController')->middleware('admin');
        Route::get('/{user}', 'ShowController')->middleware('admin');
        Route::patch('/{user}', 'UpdateController');

        Route::post('/{user}/addProduct', 'Basket\AddProductController');
        Route::post('/{user}/removeProduct', 'Basket\RemoveProductController');

    });
    Route::post('/', 'StoreController');
    Route::post('/login', 'LoginController');
});

Route::group([
    'namespace' => 'Api\Order',
    'middleware' => ['auth:sanctum','api'],
    'prefix' => 'orders'], function ($router){
    Route::post('/', 'StoreController')->middleware('admin');
    Route::get('/', 'IndexController')->middleware('admin');
    Route::post('/{order}/updateStatus', 'UpdateController')->middleware('admin');

});
