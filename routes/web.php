<?php


use App\Models\Kos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KosController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BerandaAdminController;
use App\Http\Controllers\OrderController;

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

// Menu Halaman Depan
Route::get('/', [HomeController::class, 'index']);
Route::get('detail', [HomeController::class, 'show'])->name('show.kos');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/kos', [HomeController::class, 'index']);


// Login
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authentication'])->middleware('guest')->name('authentication');
    Route::get('/daftar', [AuthController::class, 'register'])->name('register');
    Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar');
});
// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [BerandaAdminController::class, 'index'])->name('dashboard');
    Route::resource('kos', KosController::class);
    Route::resource('user', UserController::class);
});

Route::get('profile/{user}', [BerandaAdminController::class , 'profile'])->name('profile');
Route::put('profile/{user}', [BerandaAdminController::class , 'updateProfile'])->name('edit.profile');
Route::get('/logout', [AuthController::class, 'logout']);


// Whatsapp
Route::resource('order', OrderController::class);