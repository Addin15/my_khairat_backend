<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\GraveController;

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
// ----- ADMIN ----
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'register']);

Route::get('/mosque/all', [CommitteeController::class, 'getMosques']);
Route::get('/mosque/{mosque_id}/village/all', [CommitteeController::class, 'getVillages']);



// Protected
Route::group(['middleware' => ['auth:sanctum']], function () {

    // ----- NORMAL USER -----
    Route::post('/user', [UserController::class, 'getUser']);
    Route::put('/complete', [UserController::class, 'complete']);
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
    //announcements
    Route::post('/committee/announcements/get', [AnnouncementController::class, 'getAnnouncements']);
    Route::post('/committee/announcements/add', [AnnouncementController::class, 'addAnnouncement']);
    Route::put('/committee/announcements/edit', [AnnouncementController::class, 'editAnnouncement']);
    Route::post('/committee/announcements/delete', [AnnouncementController::class, 'deleteAnnouncement']);
    //graves
    Route::post('/committee/graves/get', [GraveController::class, 'getGraves']);
    Route::post('/committee/graves/add', [GraveController::class, 'addGrave']);
    Route::put('/committee/graves/edit', [GraveController::class, 'editGrave']);
    Route::post('/committee/graves/delete', [GraveController::class, 'deleteGrave']);
    //grave lots
    Route::post('/committee/graves/lots/get', [GraveController::class, 'getLots']);
    Route::post('/committee/graves/lots/add', [GraveController::class, 'addLot']);
    Route::put('/committee/graves/lots/edit', [GraveController::class, 'editLot']);
    Route::post('/committee/graves/lots/delete', [GraveController::class, 'deleteLot']);
    // profile
    Route::put('/committee/complete', [CommitteeController::class, 'complete']);
    Route::post('/committee/logout', [CommitteeController::class, 'logout']);

    // ----- ADMIN -----
    Route::post('/admin/logout', [AdminController::class, 'logout']);
});