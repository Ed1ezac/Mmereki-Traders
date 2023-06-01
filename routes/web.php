<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchProcessor;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TradeQualificationController;

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

Route::get('/', [SearchProcessor::class, 'search']);
Route::get('/about', [SearchProcessor::class, 'about']);
Route::get('/terms', [SearchProcessor::class, 'terms']);
Route::get('/privacy-policy', [SearchProcessor::class, 'privacy']);

Route::get('/trader/{id?}/details', [SearchProcessor::class, 'traderDetails']);
Route::get('/results', [SearchProcessor::class, 'processSearchRequest'])->name('search.results');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //middleware - 'verified'
    Route::get('/membership', [MembershipController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    //profile
    Route::get('/edit-profile', [CompanyController::class, 'edit']);
    Route::post('/upload-logo', [CompanyController::class,'uploadLogo']);
    Route::post('/update-profile', [CompanyController::class, 'update']);
    //user
    Route::get('/settings', [UserController::class, 'editUser']);
    Route::post('/settings/update-user', [UserController::class, 'updateUser']);
    //qualification
    Route::post('/upload-document', [TradeQualificationController::class, 'uploadQualification']);
    Route::get('/document/{id?}/download', [TradeQualificationController::class, 'downloadQualification']);
    Route::get('/document/{id?}/delete', [TradeQualificationController::class, 'deleteQualification']);
    //
    Route::get('/challenge/create/first-administrator', [AdminController::class, 'createFirstAdmin']);
});

Route::group(['prefix' =>'admin', 'middleware' =>'auth'], function () {
    // 'middleware' =>'admin'
    Route::get('/companies', [CompanyController::class, 'adminCompaniesList']);
    Route::post('/company/verify/', [CompanyController::class, 'adminVerifyCompany']);
    Route::post('/company/unverify/', [CompanyController::class, 'adminUnverifyCompany']);
    Route::get('/company/{id?}/details', [CompanyController::class, 'adminCompanyDetail']);
    Route::get('/document/{id?}/download', [TradeQualificationController::class, 'adminDownloadQualification']);
    Route::get('/membership/{id?}/revoke', [MembershipController::class, 'adminRevokeMembership']);
    Route::get('/membership/{id?}/invoke-expiry', [MembershipController::class, 'adminSetMembershipAsExpired']);
});