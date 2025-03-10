<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // FORUM ROUTES
    Route::resource('threads', ThreadController::class);
    Route::post('threads/{thread}/replies', [ReplyController::class, 'store'])->name('threads.replies.store');

});

require __DIR__.'/auth.php';
