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
use App\Http\Controllers\PdfViewersController;
use App\Http\Controllers\UploadPersyaratanController;
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


    Route::resource('users', UserController::class);

    //superadmin
    // Route::middleware(['role:superadmin'], function () {
    //     //verifikasi
    //     // Route::get('verifikasi/review', [UploadPersyaratanController::class, 'review'])->name('adm.verifikasi.review');
    //     // Route::post('verifikasi/{id}/verify', [UploadPersyaratanController::class, 'verify'])->name('adm.verifikasi.verify');
    //     // Route::post('verifikasi/{id}/reject', [UploadPersyaratanController::class, 'reject'])->name('adm.verifikasi.reject');
    //     // //upload
    //     // Route::get('uploadpersyaratan', [UploadPersyaratanController::class, 'index'])->name('adm.uploadpersyaratan.index');
    //     // Route::get('uploadpersyaratan/create', [UploadPersyaratanController::class, 'create'])->name('adm.uploadpersyaratan.create');
    //     // Route::post('uploadpersyaratan', [UploadPersyaratanController::class, 'store'])->name('adm.uploadpersyaratan.store');
    // });

    //kadis
    Route::middleware(['role:kadis'], function () {
        Route::resource('users', UserController::class);
    });

    //verifikator
    Route::middleware(['role:verifikator'], function () {
    });
    Route::get('verifikasi/review', [UploadPersyaratanController::class, 'review'])->name('verifikasi.review');
    Route::get('verifikasi/riwayat', [UploadPersyaratanController::class, 'riwayat'])->name('verifikasi.riwayat');
    Route::get('verifikasi/{id}/detail', [UploadPersyaratanController::class, 'detail'])->name('verifikasi.detail');
    Route::post('verifikasi/{id}/verify', [UploadPersyaratanController::class, 'verify'])->name('verifikasi.verify');
    Route::post('verifikasi/{id}/reject', [UploadPersyaratanController::class, 'reject'])->name('verifikasi.reject');
    // Route::get('pdfviewer/{id}/pdf', [UploadPersyaratanController::class, 'showPdfViewer'])->name('pdf.viewer');
    // Route::get('uploadpersyaratan/{id}/fetch-pdf', [UploadPersyaratanController::class, 'fetchPDF'])->name('uploadpersyaratan.fetchPDF');
    Route::get('/pdf-viewer', function () {
        return view('uploadpersyaratan.pdfviewer');
    })->name('pdf-viewer');

    //pers
    Route::middleware(['role:pers'], function () {
    });
    Route::get('uploadpersyaratan', [UploadPersyaratanController::class, 'index'])->name('uploadpersyaratan.index');
    Route::post('uploadpersyaratan', [UploadPersyaratanController::class, 'store'])->name('uploadpersyaratan.store');
    Route::get('uploadpersyaratan/create', [UploadPersyaratanController::class, 'create'])->name('uploadpersyaratan.create');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('uploadpersyaratan', [UploadPersyaratan::class, 'index'])->name('uploadpersyaratan.index');
//     Route::get('uploadpersyaratan/create', [UploadPersyaratan::class, 'create'])->name('uploadpersyaratan.create');
//     Route::post('uploadpersyaratan', [UploadPersyaratan::class, 'store'])->name('uploadpersyaratan.store');
// });
