<?php
use App\Models\DailyMessage;
use Carbon\Carbon;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\DailyMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $today = Carbon::today()->toDateString();
    $dailyMessageRecord = DailyMessage::where('date', $today)->first();
    $dailyMessage = $dailyMessageRecord ? $dailyMessageRecord->message : "No message for today yet—keep grinding, legend!";
    
    return view('dashboard', compact('dailyMessage'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/daily-dose', [DailyMessageController::class, 'show'])->name('daily-dose.show');
    
    // FORUM ROUTES
    Route::resource('threads', ThreadController::class);
    Route::post('threads/{thread}/replies', [ReplyController::class, 'store'])->name('threads.replies.store');

});

require __DIR__.'/auth.php';
