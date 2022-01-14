<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchProcessor;
use App\Http\Controllers\DashboardController;

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

Route::get('/results', [SearchProcessor::class, 'processSearchRequest'])->name('search.results');
Route::get('/trader/{id?}/details', [SearchProcessor::class, 'traderDetails']);
Route::get('/invalid-search', [SearchProcessor::class, 'invalidDetails']);

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
