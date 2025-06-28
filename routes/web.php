<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;




Route::get('/', [RouteController::class, 'index'])->name('home');
Route::post('/send-message', [UserController::class, 'send_message'])->name('message.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// user
Route::middleware(['auth', 'verified', UserMiddleware::class])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/initiate', [WalletsController::class, 'initiatePayment'])->name('dashboard.initiatePayment');
    Route::get('/paystack/callback', [WalletsController::class, 'handleGatewayCallback'])->name('wallet.callback');
    
    Route::post('/dashboard/buy', [OrderController::class, 'buyNumber'])->name('dashboard.buy');
});

// admins
Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/number', [AdminController::class, 'number'])->name('admin.number');
    Route::post('/admin/number/profit', [AdminController::class, 'update_amount'])->name('admin.number.profit');
    Route::get('/admin/message', [AdminController::class, 'message'])->name('admin.message');
    Route::get('/setting', [AdminController::class, 'setting'])->name('admin.setting');
    Route::post('/setting/update', [AdminController::class, 'update_details'])->name('admin.update');
    Route::post('/setting/password', [AdminController::class, 'update'])->name('admin.password');
    Route::post('/message/delete', [AdminController::class, 'delete_message'])->name('message.delete');
});

require __DIR__.'/auth.php';
