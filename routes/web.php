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

Auth::routes(['verify'=>true]);

Route::get('/', [SearchProcessor::class, 'search']);
Route::get('/about', [SearchProcessor::class, 'about']);
Route::get('/terms', [SearchProcessor::class, 'terms']);
Route::get('/privacy-policy', [SearchProcessor::class, 'privacy']);
Route::get('/refund-policy', [SearchProcessor::class, 'refunds']);

Route::get('/trader/{id?}/details', [SearchProcessor::class, 'traderDetails']);
Route::get('/results', [SearchProcessor::class, 'processSearchRequest'])->name('search.results');

Route::middleware(['auth'])->group(function () {
    //middleware - 'verified'
    Route::get('/membership', [MembershipController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    //profile
    Route::get('/edit-profile', [CompanyController::class, 'edit']);
    Route::post('/upload-logo', [CompanyController::class,'uploadLogo']);
    Route::post('/update-profile', [CompanyController::class, 'update']);
    Route::post('/update-intro', [CompanyController::class, 'updateIntro']);
    Route::post('/update-location', [CompanyController::class, 'updateLocation']);
    Route::post('/update-tel', [CompanyController::class, 'updateTel']);
    Route::post('/update-mobile', [CompanyController::class, 'updateMobile']);
    Route::post('/update-about', [CompanyController::class, 'updateAbout']);
    Route::get('/remove-logo', [CompanyController::class, 'removeLogo']);
    //user
    Route::get('/settings', [UserController::class, 'editUser']);
    Route::post('/settings/update-user', [UserController::class, 'updateUser']);
    //qualification
    Route::post('/upload-document', [TradeQualificationController::class, 'uploadQualification']);
    Route::get('/document/{id?}/download', [TradeQualificationController::class, 'downloadQualification']);
    Route::get('/document/{id?}/delete', [TradeQualificationController::class, 'deleteQualification']);
    //
    Route::get('/membership/subscribe', [MembershipController::class, 'subscribe']);
});

Route::group(['prefix' =>'admin', 'middleware' =>'admin'], function () {
    //user
    Route::get('/users', [UserController::class, 'list']);
    Route::get('users/user/{id?}/promote/admin', [UserController::class, 'makeAdmin']);
    Route::get('/users/user/{id?}/promote/moderator', [UserController::class, 'makeModerator']);
    Route::get('/users/user/{id?}/demote-to-trader', [UserController::class, 'demoteToTrade']);
    Route::post('users/user/{id?}/disable/account', [UserController::class, 'deactivate']);
    //
    Route::get('/companies', [CompanyController::class, 'adminCompaniesList']);
    Route::post('/company/verify/', [CompanyController::class, 'adminVerifyCompany']);
    Route::post('/company/unverify/', [CompanyController::class, 'adminUnverifyCompany']);
    Route::get('/company/{id?}/details', [CompanyController::class, 'adminCompanyDetail']);
    Route::get('/document/{id?}/download', [TradeQualificationController::class, 'adminDownloadQualification']);
    Route::get('/membership/{id?}/revoke', [MembershipController::class, 'adminRevokeMembership']);
    Route::get('/membership/{id?}/invoke-expiry', [MembershipController::class, 'adminSetMembershipAsExpired']);

});

Route::get('/challenge/create/first-administrator', [AdminController::class, 'createFirstAdmin'])->middleware(['auth', 'verified']);

//mail test
/*Route::get('/notification', function () {
    //$invoice = Invoice::find(1);
    $user = User::first();

    return (new VerifyEmail())
                ->toMail($user);
});*/