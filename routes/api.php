<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth Routes
// Route::middleware('guest')->prefix('auth')->group(function () {
//     Route::post('register', [AuthController::class, 'register'])->name('register');
//     Route::post('login', [AuthController::class, 'login'])->name('login');
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// });

//Authenticated Routes
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function () {
//         return auth()->user();
//     })->name('users.index');
// });


Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

Route::post('password/forgot-password', [ForgetPasswordController::class, 'forgotPassword']);

Route::post('password/reset', [ResetPasswordController::class, 'passwordReset']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('email-verification', [EmailVerificationController::class, 'email_verification']);
    Route::get('email-verification', [EmailVerificationController::class, 'sendEmailVerification']);
});
