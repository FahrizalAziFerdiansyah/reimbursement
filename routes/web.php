<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('pages.auth.login');
// });
Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('/submission')->name('submission.')->group(function () {
        Route::get('/', [SubmissionController::class, 'index'])->name('index');
        Route::get('/data', [SubmissionController::class, 'data'])->name('data');
        Route::get('/create', [SubmissionController::class, 'create'])->name('create');
        Route::post('/store', [SubmissionController::class, 'store'])->name('store');
        Route::get('/show/{submission:uuid?}', [SubmissionController::class, 'show'])->name('show');
        Route::post('/update-status', [SubmissionController::class, 'updateStatus'])->name('update_status');
    });
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/data', [UserController::class, 'data'])->name('data');
        Route::get('/create/{user:nip?}', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{user:nip?}', [UserController::class, 'show'])->name('show');
    });
});
