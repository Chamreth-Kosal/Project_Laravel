<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Team;
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
//=========================Event=============================
    Route::resource('/events', EventController::class);
    Route::get('/search', [EventController::class,'search']);

//==================Team routes =============================
    Route::resource('/teams', TeamController::class);

//========================User Routes========================
    Route::resource('/users', UserController::class);

//==========================Ticket===========================
    Route::resource('/tickets', TicketController::class);

//==========================Stadium===========================
    Route::resource('/stadiums', StadiumController::class);