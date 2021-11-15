<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\ArticleController;

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

//Route::middleware('auth:api')->get('/blog', function (Request $request) {
//    return $request->user();
//});

//Route::apiResource('articles', ArticleController::class);

Route::get('/articles', [ArticleController::class, 'browse']);
Route::get('/articles/{id}', [ArticleController::class, 'read']);
Route::post('/articles', [ArticleController::class, 'add']);
Route::put('/articles/{id}', [ArticleController::class, 'edit']);
Route::delete('/articles/{id}', [ArticleController::class, 'delete']);
