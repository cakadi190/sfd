<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowerController;

Route::get('/testing-functionality', [App\Http\Controllers\TestingFunctionality::class, 'index']);
Route::get('/testing-success/{loan_id}', [App\Http\Controllers\TestingFunctionality::class, 'success']);
Route::get('/testing-overdue/{loan_id}', [App\Http\Controllers\TestingFunctionality::class, 'overdue']);

/*
  Redesign Route
 */
Route::view('/index-new', 'index-new');
Route::view('/about-new', 'about-new');
/*
  New Routes
*/
Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');

/**
 * Main Routes
 */
Auth::routes([
  'verify'    => true,
  'register'  => false,
]);

/**
 * PayNow Controller
 */
Route::prefix('pay-now')->group(function () {
  Route::view('/', 'paynow-index')->name('pay.now');
  Route::post('/check', [\App\Http\Controllers\PayNowController::class, 'check'])->name('pay.checking');
});

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
  Route::get('/getDataPieToday', [App\Http\Controllers\HomeController::class, 'getDataPieToday']);
  Route::get('/getDataPieThisMonth', [App\Http\Controllers\HomeController::class, 'getDataPieThisMonth']);
  Route::get('/getDataPieLastMonth', [App\Http\Controllers\HomeController::class, 'getDataPieLastMonth']);

  Route::post('reject-applicant/{id}', [App\Http\Controllers\ApplicantController::class, 'sendRejectionEmail'])->name('dashboard.reject-applicant');
  Route::get('approve-applicant/{id}', [App\Http\Controllers\ApplicantController::class, 'approveApplicant'])->name('dashboard.approve-applicant');
  Route::get('getModalApprove/{id}', [App\Http\Controllers\ApplicantController::class,'getDataModalApprove'])->name('dashboard.modal-approve');
  Route::get('getModalDetail/{id}', [App\Http\Controllers\ApplicantController::class, 'getDataModalDetail'])->name('dashboard.modal-detail');
  Route::get('getModalReject/{id}', [App\Http\Controllers\ApplicantController::class, 'getDataModalReject'])->name('dashboard.modal-reject');

  Route::get('getModalDisbursement/{id}', [App\Http\Controllers\BorrowerController::class, 'getDataModalDisbursement'])->name('dashboard.modal-disbursement');
  Route::get('loan-disburse/{id}', [App\Http\Controllers\BorrowerController::class, 'loanDisbursementConfirm'])->name('dashboard.loan-disbursement');
  Route::get('getModalDetailBorrower/{id}', [App\Http\Controllers\BorrowerController::class, 'getDataModalDetail'])->name('dashboard.modal-detail-borrower');
  Route::get('getModalMonthlyEmail/{id}', [App\Http\Controllers\BorrowerController::class, 'getDataModalMonthlyEmail']);
  Route::post('sendMonthlyEmail/{id}', [App\Http\Controllers\BorrowerController::class, 'sendMonthlyEmail']);
  Route::get('getModalBlacklistBorrower/{id}', [App\Http\Controllers\BorrowerController::class, 'getDataModalBlacklistBorrower']);
  Route::get('blacklistBorrower/{id}', [App\Http\Controllers\BorrowerController::class, 'blacklistBorrower']);
  Route::get('getModalPaymentCompleted/{id}',[App\Http\Controllers\BorrowerController::class, 'getDataModalPaymentCompleted']);
  Route::get('paymentCompleted/{id}', [App\Http\Controllers\BorrowerController::class, 'paymentCompletedConfirmation']);
  Route::get('getModalMonthlyPayment/{id}', [App\Http\Controllers\BorrowerController::class, 'getDataModalMonthlyPayment']);
  Route::post('monthlyPaymentSuccess/{id}', [App\Http\Controllers\BorrowerController::class, 'monthlyPaymentSuccess']);


  Route::resource('collection', \App\Http\Controllers\CollectionController::class);
  Route::get('/collection/export-csv', [App\Http\Controllers\CollectionController::class, 'exportCSV']);
  Route::resource('overdue-installment', \App\Http\Controllers\OverdueInstallmentController::class);
  Route::resource('applicant', \App\Http\Controllers\ApplicantController::class);
  Route::resource('borrower', \App\Http\Controllers\BorrowerController::class);
  Route::resource('sales', \App\Http\Controllers\SalesController::class);
  Route::resource('late-changes', \App\Http\Controllers\LateChangeController::class);
  Route::get('getModalDetailInstallment/{id}', [App\Http\Controllers\LateChangeController::class, 'modalDetailInstallment']);
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
    Route::get('getDataModalPW/{id}', [\App\Http\Controllers\UserRolesController::class, 'getDataModalPW']);
    Route::post('changeUserPW/{id}', [App\Http\Controllers\UserRolesController::class, 'changePW'])->name('settings.change-pw');
    Route::get('getDataModalEdit/{id}', [\App\Http\Controllers\UserRolesController::class, 'getDataModalEdit']);
    Route::post('editDataUser/{id}', [App\Http\Controllers\UserRolesController::class, 'editDataUserDetail']);
    Route::post('addDataUser', [App\Http\Controllers\UserRolesController::class, 'addNewUser']);
  });
});
