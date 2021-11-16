<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', url('login'), 301);
Auth::routes(['verify' => true]);

Route::get('auth/{provider}/redirect', [\App\Http\Controllers\Auth\Social\LoginController::class, 'login'])->name('social-login');
Route::get('auth/{provider}/process', [\App\Http\Controllers\Auth\Social\LoginController::class, 'process'])->name('social-login.process');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');

    Route::resource('collection', \App\Http\Controllers\CollectionController::class);
    Route::resource('overdue-installment', \App\Http\Controllers\OverdueInstallmentController::class);
    Route::resource('borrower', \App\Http\Controllers\BorrowerController::class);
    Route::resource('sales', \App\Http\Controllers\SalesController::class);
    Route::resource('late-changes', \App\Http\Controllers\LateChangeController::class);
    Route::resource('ekyc-log', \App\Http\Controllers\EkycLogController::class);
    Route::resource('users', \App\Http\Controllers\UserManagement::class);

    Route::prefix('user')->group(function () {
        Route::get('edit-profile', [\App\Http\Controllers\UserDataController::class, 'edit'])->name('edit-user');
        Route::post('edit-profile', [\App\Http\Controllers\UserDataController::class, 'editProcess'])->name('edit-user.process');

        Route::get('password', [\App\Http\Controllers\UserDataController::class, 'change'])->name('change-password');
        Route::post('password', [\App\Http\Controllers\UserDataController::class, 'changeProcess'])->name('change-password.process');
    });

    Route::prefix('settings')->group(function () {
        Route::get('session', [\App\Http\Controllers\SessionDataController::class, 'lists'])->name('sessions');
        Route::post('session', [\App\Http\Controllers\SessionDataController::class, 'actionLogout'])->name('sessions.logout');

        Route::resource('user-role', \App\Http\Controllers\UserRolesController::class);
        Route::resource('login-history', \App\Http\Controllers\UserLoginHistoryController::class);
    });
});
