<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//front routes
Route::get('/', [App\Http\Controllers\customer\frontController::class, 'index'])->name('customer.home');
Route::get('/events', [App\Http\Controllers\customer\frontController::class, 'events']);
Route::get('/blog', [App\Http\Controllers\customer\frontController::class, 'blog']);

//customer dashboard routes
Route::middleware(['customer', 'auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\customer\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/members', [App\Http\Controllers\customer\Dashboard\DashboardController::class, 'member'])->name('dashboard.member');
    Route::get('/connections', [App\Http\Controllers\customer\Connection\ConnectionController::class, 'index'])->name('dashboard.connection');
    Route::get('/events', [App\Http\Controllers\customer\Dashboard\DashboardController::class, 'events'])->name('dashboard.events');
    Route::get('/profile', [App\Http\Controllers\customer\Dashboard\DashboardController::class, 'profile'])->name('dashboard.profile');


    //route for connection request
    Route::get('/send-connection-request/{id}', [App\Http\Controllers\customer\Connection\ConnectionController::class, 'sendConnectionRequest'])->name('send.connection.request');
});

//admin dashboard routes
Route::middleware(['admin', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members');
    Route::get('/applications', [App\Http\Controllers\Admin\DashboardController::class, 'applications'])->name('applications');
    Route::get('/events', [App\Http\Controllers\Admin\DashboardController::class, 'events'])->name('events');
    Route::get('/analytics', [App\Http\Controllers\Admin\DashboardController::class, 'analytics'])->name('analytics');
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
