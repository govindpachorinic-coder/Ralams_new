<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\LandAllocationTempController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApplicationDetailController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
});

Route::get('/', function () {
    if (\Auth::guest()) {
        return view('auth.logins');
    } else {
        return redirect('app');
    }
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/applicant_form', function () {
//     return view('land_allotment.applicant_form');
// })->name('applicant_form');

// Applicant Form 
// Route::get('/applicant_form', [ApplicantController::class, 'create'])->name('applicant_form');
// Route::post('/applicant_form', [ApplicantController::class, 'store'])->name('applicant.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/get-all-applications/{status}', [ApplicantController::class, 'getAllApplications'])->name('get.all.application');
    Route::get('/application-details/{status}/{id}', [ApplicantController::class, 'getApplicationDetails'])->name('application.details');
    Route::get('/page/{id}', [ApplicantController::class, 'getComments'])->name('application.comments');
    Route::post('/update-application-status', [ApplicantController::class, 'updateApplicationStatus'])->name('update.applicationSatatus');
    Route::get('/user-dashboard', [AuthController::class, 'user_dashboard'])->name('user_dashboard.create');
    Route::get('get-incomplete-application', [AuthController::class, 'getIncompleteApplication'])->name('user.get_incomplete_application');
    Route::post('/get-rolewise-users', [ApplicantController::class, 'getRolewiseUser'])->name('getRolewiseUser');

    Route::get('add-application', [ApplicationDetailController::class, 'showApplication'])->name('add.application');
    Route::get('dashboard', [ApplicationDetailController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('get-application/{type}', [ApplicationDetailController::class, 'getApplication'])->name('user.get_application');
    Route::post('delete-application/{id}', [ApplicationDetailController::class, 'deleteApplication'])->name('user.delete_application');
    Route::get('checklist/{id}', [ApplicationDetailController::class, 'showCheckList'])->name('checklist');


    Route::get('/application/{id}/edit', [ApplicationDetailController::class, 'edit'])->name('application.edit');
    Route::put('/application/{id}', [ApplicationDetailController::class, 'update'])->name('application.update');

    Route::post('/change-application-status', [ApplicantController::class, 'changeApplicationStatus'])->name('change.applicationSatatus');
    Route::post('/transaction-action', [ApplicantController::class, 'transactionAction'])->name('transaction.action');

    
    Route::get('new-application', [ApplicationController::class, 'newApplication'])->name('new.application');
Route::post('/save-application', [ApplicationController::class, 'saveApplication'])->name('application.store');


});




Route::get('/password/reset-direct', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.direct');

Route::post('/password/reset-direct', [ResetPasswordController::class, 'reset'])->name('password.reset.direct.post');
Route::post('/password/resetpassword-direct', [ResetPasswordController::class, 'resetpassword'])->name('password.resetpassword.direct.post');



Route::get('/applicant_form', [LandAllocationTempController::class, 'create'])->name('temporary_land_allocation.create');
Route::post('/temporary-land-allocation', [LandAllocationTempController::class, 'store'])->name('temporary_land_allocation.store');
Route::post('/application_submit', [ApplicationDetailController::class, 'store'])->name('application_submit.store');
Route::post('/land-details-submit', [ApplicationDetailController::class, 'landDetailSave'])->name('application.landdetail.store');
Route::post('/land_details_submit2', [ApplicationDetailController::class, 'landDetailSave2'])->name('application.landdetailsave.store');
Route::post('/save_documents', [ApplicationDetailController::class, 'saveDocuments'])->name('application.documentsave.store');
Route::post('/save_documents_patwari', [ApplicationDetailController::class, 'saveDocumentsPatwari'])->name('application.documents.store');
Route::post('/final-submit', [ApplicationDetailController::class, 'finalSubmit'])->name('application.finalsubmit.store');
Route::post('/save_sanstha_vivran', [ApplicationDetailController::class, 'saveSansthaDetails'])->name('application.saveSansthaDetails.store');
Route::get('/application/preview/{id}', [ApplicationDetailController::class, 'showApplicationPreview']);
Route::delete('/delete-file/{id}', [ApplicationDetailController::class, 'destroy']);



Route::get('/dashboards', function () {
    return view('dashboard');
});

Route::get('/hindi-input', function () {
    return view('hindi_input');
});








Route::get('register', [AuthController::class, 'showRegisterForm']);
Route::get('app', [AuthController::class, 'app']);
Route::get('bhumi_chayan', [LandAllocationTempController::class, 'bhumi_chayan'])->middleware('auth')->name('bhumi_chayan.form');
Route::get('bhumi_vivran', [LandAllocationTempController::class, 'bhumi_vivran'])->name('bhumi_vivran.form');
Route::get('documents_upload', [LandAllocationTempController::class, 'documentation'])->name('documentation.form');
Route::get('preview', [LandAllocationTempController::class, 'preview'])->name('preview.form');
Route::get('sanstha_viivran', [LandAllocationTempController::class, 'sanstha_viivran'])->name('sanstha_viivran.form');
Route::get('land_selection', [AuthController::class, 'land_selection'])->name('land_selection.form');
Route::get('getlocation', [AuthController::class, 'getlocation'])->name('getlocation.form');
Route::get('getlocationland', [AuthController::class, 'getlocationland'])->name('getlocationland.form');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/get-khasra', [AuthController::class, 'getKhasra'])->name('get.khasra');
Route::post('/get-khasra-details', [AuthController::class, 'getKhasraDetails'])->name('get.khasra.details');

Route::get('logins', [AuthController::class, 'showLoginForms'])->name('logins.form');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('login/send-otp', [AuthController::class, 'sendOtp'])->name('login.sendotp');
Route::post('login/verify', [AuthController::class, 'verifyOtp'])->name('login.verify');
Route::post('loginsubmit', [AuthController::class, 'submoitlogin'])->name('login.submit');




Route::any('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register/send-otp', [RegisterController::class, 'sendOtp'])->name('register.sendOtp');
Route::get('/captcha-image', [RegisterController::class, 'generateCaptcha'])->name('captcha.image');
Route::get('/sso_details_view', [RegisterController::class, 'sso_details_view']);

Route::post('/sso_details', [RegisterController::class, 'sso_details'])->name('sso.store');

Route::post('/register/verify-otp', [RegisterController::class, 'verifyOtp'])->name('register.verifyOtp');




Route::get('/ssologin', function () {
    include base_path('raj_sso_project/login.php');
});



