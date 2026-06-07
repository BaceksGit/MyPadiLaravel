<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\DiseaseMedicineController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

// User dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Scan routes
Route::middleware(['auth'])->group(function () {
    // Scan page
    Route::get('/scan', function () {
        return view('scan');
    })->name('scan');

    // Scan analyze handled by controller
    Route::post('/scan/analyze', [ScanController::class, 'analyze'])->name('scan.analyze');
});

Route::get('/scan/{id}', [ScanController::class, 'show'])
    ->name('scan.result')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/diseasemedicine', [DiseaseMedicineController::class, 'index'])
        ->name('diseasemedicine.index');
});

//test page
Route::get('/test',function(){
    return view('test');
})->name('test');

//feedback
Route::middleware(['auth'])->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/feedback/{feedback}/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');
});

require __DIR__.'/auth.php';
