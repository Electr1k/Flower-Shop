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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api\Flower',
    'middleware' => 'api',
    'prefix' => 'flowers'], function ($router){
    Route::get('/filter', 'FilterListController');
    Route::get('/', 'IndexController');
    Route::get('/{flower}', 'ShowController');
});
