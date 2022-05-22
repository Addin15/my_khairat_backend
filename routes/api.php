<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login and register
// ----- NORMAL USER -----
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
// ----- COMMITTEE -----
Route::post('/committee/login', [CommitteeController::class, 'login']);
Route::post('/committee/register', [CommitteeController::class, 'register']);
// ----- NORMAL USER -----
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'register']);



// Protected
Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::put('/committee/complete', [CommitteeController::class, 'complete']);

    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/committee/logout', [CommitteeController::class, 'logout']);
    Route::post('/admin/logout', [AdminController::class, 'logout']);
});