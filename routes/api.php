<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('/category', CategoryController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

        // Route::group(['Middleware'=>'api'],function(){
        //     Route::post('getmain','CategoryController@index');
        // });

