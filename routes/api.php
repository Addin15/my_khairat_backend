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
use App\Http\Controllers\DependentController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\ClaimController;

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
Route::get('/bankdetails', [CommitteeController::class, 'bank']);
Route::post('/committee/login', [CommitteeController::class, 'login']);
Route::post('/committee/register', [CommitteeController::class, 'register']);
Route::post('/committee/announcements/get', [AnnouncementController::class, 'getAnnouncements']);
// ----- ADMIN ----
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'register']);

Route::get('/mosque/all', [CommitteeController::class, 'getMosques']);
Route::get('/mosque/accepted', [CommitteeController::class, 'getAcceptedMosques']);
Route::get('/mosque/{mosqueID}', [CommitteeController::class, 'getMosque']);
Route::get('/village/{villageID}', [CommitteeController::class, 'getVillage']);
Route::get('/mosque/{mosque_id}/village/all', [CommitteeController::class, 'getVillages']);



// Protected
Route::group(['middleware' => ['auth:sanctum']], function () {

    // ----- NORMAL USER -----
    Route::post('/user', [UserController::class, 'getUser']);
    Route::post('/complete', [UserController::class, 'complete']);
    Route::post('/logout', [UserController::class, 'logout']);
    //dependent
    Route::post('/dependents/get', [DependentController::class, 'getDependents']);
    Route::post('/dependents/add', [DependentController::class, 'addDependent']);
    Route::put('/dependents/edit', [DependentController::class, 'editDependent']);
    Route::post('/dependents/delete', [DependentController::class, 'deleteDependent']);
    
    //claim
    Route::post('/claims/add', [ClaimController::class, 'addClaim']);
    // payment
    Route::post('/payment/add', [PaymentController::class, 'add']);
    Route::post('/payment/get', [PaymentController::class, 'get']);

    // ----- COMMITTEE USER -----
    Route::post('/committee/get', [CommitteeController::class, 'get']);
    //claims
    Route::post('/committee/claims/get', [ClaimController::class, 'getClaim']);
    Route::put('/committee/claims/action', [ClaimController::class, 'action']);
    //payments
    Route::post('/committee/payments/get', [PaymentController::class, 'getFromAdmin']);
    Route::put('/committee/payments/action', [PaymentController::class, 'action']);
    Route::post('/committee/payments/delete', [PaymentController::class, 'delete']);
    //members
    Route::post('/committee/members/get', [CommitteeController::class, 'getMembers']);
    Route::post('/committee/members/add', [CommitteeController::class, 'addMembers']);
    Route::put('/committee/members/update', [CommitteeController::class, 'updateMember']);
    Route::post('/committee/members/accept', [CommitteeController::class, 'acceptMember']);
    Route::post('/committee/members/reject', [CommitteeController::class, 'rejectMember']);
    // dependent
    Route::post('/committee/dependent/get', [CommitteeController::class, 'getDependents']);
    Route::post('/committee/dependent/add', [DependentController::class, 'addDependent']);
    Route::post('/committee/dependent/accept', [CommitteeController::class, 'acceptDependent']);
    Route::post('/committee/dependent/reject', [CommitteeController::class, 'rejectDependent']);
    //villages
    Route::post('/committee/villages/get', [VillageController::class, 'get']);
    Route::post('/committee/villages/add', [VillageController::class, 'add']);
    Route::put('/committee/villages/edit', [VillageController::class, 'edit']);
    Route::post('/committee/villages/delete', [VillageController::class, 'delete']);
    //announcements
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
    Route::resource('/committee/complete', CommitteeController::class);
    Route::post('/committee/logout', [CommitteeController::class, 'logout']);
    // plan
    Route::post('/committee/plan/', [CommitteeController::class, 'getPlans']);
    Route::post('/committee/plan/subscribe', [CommitteeController::class, 'makePayment']);
    // bank details
    Route::put('/committee/bank/edit', [CommitteeController::class, 'editBankDetails']);

});