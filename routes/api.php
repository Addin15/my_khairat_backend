<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\PaymentController;

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
// ----- ADMIN -----
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'register']);



// Protected
Route::group(['middleware' => ['auth:sanctum']], function () {

    // ----- NORMAL USER -----
    Route::post('/logout', [UserController::class, 'logout']);

    // ----- COMMITTEE USER -----
    //payments
    Route::post('/committee/payments/get', [PaymentController::class, 'get']);
    Route::put('/committee/payments/action', [PaymentController::class, 'action']);
    Route::post('/committee/payments/delete', [PaymentController::class, 'delete']);
    //villages
    Route::post('/committee/villages/get', [VillageController::class, 'get']);
    Route::post('/committee/villages/add', [VillageController::class, 'add']);
    Route::put('/committee/villages/edit', [VillageController::class, 'edit']);
    Route::post('/committee/villages/delete', [VillageController::class, 'delete']);
    // profile
    Route::put('/committee/complete', [CommitteeController::class, 'complete']);
    Route::post('/committee/logout', [CommitteeController::class, 'logout']);

    // ----- ADMIN -----
    Route::post('/admin/logout', [AdminController::class, 'logout']);
});