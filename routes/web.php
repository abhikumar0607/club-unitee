<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//front routes
Route::get('/', [App\Http\Controllers\customer\frontController::class, 'index'])->name('customer.home');
Route::get('/events', [App\Http\Controllers\customer\frontController::class, 'events']);
Route::get('/blog', [App\Http\Controllers\customer\frontController::class, 'blog']);

//customer dashboard routes
Route::middleware(['customer', 'auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\customer\dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/members', [App\Http\Controllers\customer\dashboard\DashboardController::class, 'member'])->name('dashboard.member');
    Route::get('/dashboard/connections', [App\Http\Controllers\customer\dashboard\DashboardController::class, 'connection'])->name('dashboard.connection');
    Route::get('/dashboard/events', [App\Http\Controllers\customer\dashboard\DashboardController::class, 'events'])->name('dashboard.events');
    Route::get('/dashboard/profile', [App\Http\Controllers\customer\dashboard\DashboardController::class, 'profile'])->name('dashboard.profile');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
