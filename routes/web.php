<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//front routes
Route::get('/', [App\Http\Controllers\Customer\frontController::class, 'index'])->name('customer.home');
Route::get('/events', [App\Http\Controllers\Customer\frontController::class, 'events']);
Route::get('/event-detail/{slug}', [App\Http\Controllers\Customer\frontController::class, 'event_detail']);
Route::get('/blogs', [App\Http\Controllers\Customer\frontController::class, 'blogs'])->name('blog');
Route::get('/blog-detail/{slug}', [App\Http\Controllers\Customer\frontController::class, 'blog_detail']);
Route::get('/about', [App\Http\Controllers\Customer\frontController::class, 'about']);
Route::get('/privacy', [App\Http\Controllers\Customer\frontController::class, 'privacy']);
Route::get('/term', [App\Http\Controllers\Customer\frontController::class, 'term']);
Route::get('/thankyou', [App\Http\Controllers\Customer\frontController::class, 'thankyou'])->name('customer.thank');

//customer dashboard routes
Route::middleware(['customer', 'auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Customer\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    //Route::get('/connections', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'index'])->name('dashboard.connection');
    Route::get('/connections/match-suggestions', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'match_suggestions'])->name('match.suggestions');
    Route::get('/connections/my-connections', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'my_connections'])->name('my.connections');
    Route::get('/connections/sent-requests', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'sent_requests'])->name('sent.requests');
    Route::get('/connections/received-requests', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'received_requests'])->name('received.requests');

    //events
    Route::get('/events', [App\Http\Controllers\Customer\Event\EventController::class, 'index'])->name('dashboard.events');
    Route::post('/confirm-rsvp/{id}', [App\Http\Controllers\Customer\Event\EventController::class, 'confirmRsvp'])->name('dashboard.confirm.rsvp');
    Route::post('/cancel-rsvp/{id}', [App\Http\Controllers\Customer\Event\EventController::class, 'cancelRsvp'])->name('dashboard.cancel.rsvp');
    //profile
    Route::get('/profile', [App\Http\Controllers\Customer\Profile\ProfileController::class, 'index'])->name('dashboard.profile');
    Route::get('/profile/edit', [App\Http\Controllers\Customer\Profile\ProfileController::class, 'edit'])->name('dashboard.profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\Customer\Profile\ProfileController::class, 'update'])->name('dashboard.profile.update');
    Route::get('/profile/delete-account', [App\Http\Controllers\Customer\Profile\ProfileController::class, 'deleteAccount'])->name('dashboard.profile.delete.account');

    //members
    Route::get('/members', [App\Http\Controllers\Customer\Member\MemberController::class, 'index'])->name('members');

    Route::get('/send-connection-request/{id}', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'sendConnectionRequest'])->name('send.connection.request');
    Route::get('/cancel-connection-request/{id}', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'cancelConnectionRequest'])->name('cancel.connection.request');
    Route::get('/accept-connection-request/{id}', [App\Http\Controllers\Customer\Connection\ConnectionController::class, 'acceptConnectionRequest'])->name('accept.connection.request');

});

//admin dashboard routes
Route::middleware(['admin', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members');
    Route::get('/analytics', [App\Http\Controllers\Admin\DashboardController::class, 'analytics'])->name('analytics');

    //appicatioans
    Route::get('/applications', [App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('applications');
    // Route::get('/application/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'show'])->name('application.show');
    Route::get('/application/approve/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'approveApplication'])->name('application.approve');
    Route::get('/application/reject/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'rejectApplication'])->name('application.reject');

    //events
    Route::get('/events', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('events');
    Route::post('/events/store', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{id}', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('events.edit');
    Route::post('/events/update/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('events.update');
    Route::get('/events/destroy', [App\Http\Controllers\Admin\EventController::class, 'destroy']);
    Route::get('/events/rsvp/{id}', [App\Http\Controllers\Admin\EventController::class, 'rsvp'])->name('events.rsvp');

    //Categories
    Route::get('/categories', [App\Http\Controllers\Admin\BlogCategoryController::class, 'index'])->name('categories');
    Route::post('/categories/store', [App\Http\Controllers\Admin\BlogCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [App\Http\Controllers\Admin\BlogCategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/destroy', [App\Http\Controllers\Admin\BlogCategoryController::class, 'destroy']);

    //Blogs
    Route::get('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blogs');
    Route::post('/blogs/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/blogs/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blogs.update');
    Route::get('/blogs/destroy', [App\Http\Controllers\Admin\BlogController::class, 'destroy']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{id?}', [ProfileController::class, 'index'])->name('profile.index');

    
    Route::get('/chat/messages/{userId}', [App\Http\Controllers\ChatController::class, 'getMessages']);
    Route::post('/chat/messages', [App\Http\Controllers\ChatController::class, 'sendMessage']);
    Route::post('/chat/seen/{userId}', [App\Http\Controllers\ChatController::class, 'markAsSeen'])->name('chat.markAsSeen');
    Route::get('/chat/unseen-count/{userId}', [App\Http\Controllers\ChatController::class, 'unseen_count'])->name('chat.unseenCount');
});

require __DIR__.'/auth.php';
