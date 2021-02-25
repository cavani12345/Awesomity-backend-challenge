<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticleController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\API\RegisterLoginController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\RegisterLoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\API\RegisterLoginController::class, 'logout']);
Route::get('export', [App\Http\Controllers\API\ArticleController::class, 'exportArticle'])->name('export');
Route::get('search', [App\Http\Controllers\API\ArticleController::class,'search']);


    Route::middleware('auth:sanctum')->group( function () {
        Route::resource('articles', ArticleController::class);
    });
