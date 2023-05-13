<?php

use App\Http\Controllers\ArticleApiController;
use App\Http\Controllers\AuthenticationController;
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

Route::get('post', function(){
    echo "halo deckk! <3";
});

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);

    Route::post('/posts',[ArticleApiController::class, 'store']);

});

Route::get('/posts', [ArticleApiController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/posts/{id}', [ArticleApiController::class, 'show'])->middleware(['auth:sanctum']);

Route::post('/login1', [AuthenticationController::class, 'login']);


