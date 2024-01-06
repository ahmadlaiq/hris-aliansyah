<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterEdaranController;
use App\Http\Controllers\LetterMutasiController;
use App\Http\Controllers\LetterPeringatanController;
use App\Http\Controllers\LetterPemberitahuanController;
use App\Http\Controllers\Management\CategoriesController;
use App\Http\Controllers\Management\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Admin Middleware, hanya Admin yang bisa akses
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoriesController::class);
});

//Auth Middleware, Admin dan User bisa akses
Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('home');
    });

    Route::resource('letters', LetterController::class);
    Route::resource('letters-pemberitahuan', LetterPemberitahuanController::class);
    Route::resource('letters-edaran', LetterEdaranController::class);
    Route::resource('letters-mutasi', LetterMutasiController::class);
    Route::resource('letters-peringatan', LetterPeringatanController::class);
});
