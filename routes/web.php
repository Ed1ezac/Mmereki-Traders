<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchProcessor;

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

Route::post('/search', [SearchProcessor::class, 'processSearchRequest']);
Route::get('/results', [SearchProcessor::class, 'results']);
Route::get('/trader-details', [SearchProcessor::class, 'tradersDetails']);
Route::get('/invalid-search', [SearchProcessor::class, 'invalidDetails']);

