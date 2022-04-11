<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::get('/get_api/{pln}', [App\Http\Controllers\MainController::class, 'get_api'])->name('get_api');
Route::get('/get_api_history', [App\Http\Controllers\MainController::class, 'get_api_history'])->name('get_api_history');
Route::get('/toword/{pln}', [App\Http\Controllers\MainController::class, 'toword'])->name('toword');
