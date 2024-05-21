<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\UploadPersyaratan;

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

// Reset Password
Route::get('forgot-password', function () {
    return view('auth.forget-password', ['title' => 'Lupa Password']);
})->middleware('guest')->name('password.request');

Route::post('forgot-password', function (Request $request) {

    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token], ['title' => 'Reset Password']);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// END RESET PASSWORD



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
        Route::get('verifikasi/review', [UploadPersyaratan::class, 'review'])->name('verifikasi.review');
        Route::post('verifikasi/{id}/verify', [UploadPersyaratan::class, 'verify'])->name('verifikasi.verify');
        Route::post('verifikasi/{id}/reject', [UploadPersyaratan::class, 'reject'])->name('verifikasi.reject');
    });

    //pers
    Route::group(['middleware' => ['role:pers']], function () {
        Route::get('uploadpersyaratan', [UploadPersyaratan::class, 'index'])->name('uploadpersyaratan.index');
        Route::get('uploadpersyaratan/create', [UploadPersyaratan::class, 'create'])->name('uploadpersyaratan.create');
        Route::post('uploadpersyaratan', [UploadPersyaratan::class, 'store'])->name('uploadpersyaratan.store');
    });
});
