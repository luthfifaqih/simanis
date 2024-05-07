<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('landing', ['title' => 'SIMANIS']);
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('actionregister', [AuthController::class, 'actionregister'])->name('actionregister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

    //superadmin
    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::resource('users', UserController::class);
    });
    //kadis
    Route::group(['middleware' => ['role:kadis']], function () {
        Route::resource('users', UserController::class);
    });
    //verifikator
    Route::group(['middleware' => ['role:verifikator']], function () {
    });
    //pers
    Route::group(['middleware' => ['role:pers']], function () {
    });
});
