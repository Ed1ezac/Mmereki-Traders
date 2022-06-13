<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchProcessor;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;

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
    Route::post('/update-profile', [CompanyController::class, 'update']);
    //user
    Route::get('/settings', [UserController::class, 'editUser']);
    Route::post('/settings/update-user', [UserController::class, 'updateUser']);
});