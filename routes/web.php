<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::group(['middleware' => ['loggedIn']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/committee', [AdminController::class, 'viewCommittee'])->name('admin.committee.view');
    Route::post('/admin/committee/new', [AdminController::class, 'newCommittee'])->name('admin.committee.new.view');
    Route::post('/admin/committee/accept', [AdminController::class, 'acceptCommittee'])->name('admin.committee.accept');
    Route::post('/admin/committee/reject', [AdminController::class, 'rejectCommittee'])->name('admin.committee.reject');
    Route::get('/admin/payment', [AdminController::class, 'payment'])->name('admin.payment');
    Route::post('/admin/payment/view', [AdminController::class, 'viewPayment'])->name('admin.payment.view');
    Route::post('/admin/payment/viewonly', [AdminController::class, 'onlyViewPayment'])->name('admin.payment.only.view');
    Route::post('/admin/payment/update', [AdminController::class, 'updatePayment'])->name('admin.payment.update');
    Route::post('/admin/payment/reject', [AdminController::class, 'rejectPayment'])->name('admin.payment.reject');
    Route::get('/admin/bank', [AdminController::class, 'bank'])->name('admin.bank');
    Route::post('/admin/bank/update', [AdminController::class, 'bankUpdate'])->name('admin.bank.update');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['notLoggedIn']], function () {
    Route::get('/admin/login', function () {
        return view('admin.login');
    });
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');