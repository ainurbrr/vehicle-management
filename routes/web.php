<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('approvals', ApprovalController::class);
    Route::get('/approvals/{approval_id}/approval', [ApprovalController::class, 'approval']);
    Route::post('/bookings/{approval_id}/approve', [ApprovalController::class, 'approve']);
    Route::post('/bookings/{approval_id}/reject', [ApprovalController::class, 'reject']);

    Route::get('/exports', [ExportController::class, 'export_excel']);
});
