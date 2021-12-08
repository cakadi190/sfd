<?php

use App\Events\TestingEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowerController;

/*
  New Routes
*/
Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');

/**
 * Main Routes
 */
Route::redirect('/register', url('register'), 301);
Auth::routes([
  'verify'    => true,
  'register'  => false,
]);

/*
  Uji Coba Notification Email
 */
Route::get('/sendBorrowerNotification/{id}', [BorrowerController::class, 'sendConfirmationEmail']);
Route::get('/followUpMailNotif/{id}',[BorrowerController::class, 'followUpEmail']);
Route::get('/activatingEMandate/{id}', [BorrowerController::class, 'activatingEMandate']);

/**
 * Social Login
 */
Route::get('auth/{provider}/redirect', [\App\Http\Controllers\Auth\Social\LoginController::class, 'login'])->name('social-login');
Route::get('auth/{provider}/process', [\App\Http\Controllers\Auth\Social\LoginController::class, 'process'])->name('social-login.process');

/**
 * Register user to loan
 */
Route::prefix('register')->group(function () {
  Route::get('/', [\App\Http\Controllers\RegisterBorrowerController::class, 'register'])->name('register');
  Route::post('/process', [\App\Http\Controllers\RegisterBorrowerController::class, 'process'])->name('register.process');
  Route::view('/success', 'auth.register-success')->name('register.success');
});

/**
 * Dashboard Routes
 */
Route::prefix('dashboard')->group(function () {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');

  Route::resource('collection', \App\Http\Controllers\CollectionController::class);
  Route::resource('overdue-installment', \App\Http\Controllers\OverdueInstallmentController::class);
  Route::resource('applicant', \App\Http\Controllers\ApplicantController::class);
  Route::resource('borrower', \App\Http\Controllers\BorrowerController::class);
  Route::resource('sales', \App\Http\Controllers\SalesController::class);
  Route::resource('late-changes', \App\Http\Controllers\LateChangeController::class);
  Route::resource('ekyc-log', \App\Http\Controllers\EkycLogController::class);
  Route::resource('users', \App\Http\Controllers\UserManagement::class);

  Route::get('/social/delete', [\App\Http\Controllers\Auth\Social\SocialConnectController::class, 'disconnect'])->name('social-media.delete');
  Route::get('/social/connect', [\App\Http\Controllers\Auth\Social\SocialConnectController::class, 'connect'])->name('social-media.connect');
  Route::get('/social/{provider}/process', [\App\Http\Controllers\Auth\Social\SocialConnectController::class, 'process'])->name('social-media.process');

  Route::prefix('user')->group(function () {
    Route::get('edit-profile', [\App\Http\Controllers\UserDataController::class, 'edit'])->name('edit-user');
    Route::post('edit-profile', [\App\Http\Controllers\UserDataController::class, 'editProcess'])->name('edit-user.process');

    Route::get('password', [\App\Http\Controllers\UserDataController::class, 'change'])->name('change-password');
    Route::post('password', [\App\Http\Controllers\UserDataController::class, 'changeProcess'])->name('change-password.process');
  });

  Route::prefix('settings')->group(function () {
    Route::resource('user-role', \App\Http\Controllers\UserRolesController::class);
  });
});
