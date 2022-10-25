<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CollabController;
use App\Http\Controllers\API\LobbyVideoController;
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


Route::post('register', [RegisterController::class,'register']);
Route::post('login', [RegisterController::class,'login'])->name('login');

Route::middleware('auth:sanctum','verified')->group( function() {

    Route::post('submit_collab_form', [CollabController::class,'create'])->name('doCollab');
    Route::post('submit_lobby_form', [LobbyVideoController::class,'create'])->name('doLobbyVideo');

});


