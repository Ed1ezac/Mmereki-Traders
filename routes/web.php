<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchProcessor;
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

Route::get('/invalid-search', [SearchProcessor::class, 'invalidDetails']);
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
});

Route::group(['prefix' =>'admin', 'middleware' =>'auth'], function () {
    //- 'middleware' =>'admin'
    Route::get('/comapanies', [CompanyController::class, 'adminCompaniesList']);
    Route::get('/company/{id?}/details', [CompanyController::class, 'adminCompanyDetail']);
    
});