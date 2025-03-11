<?php

namespace App\Http\Controllers;

use App\Models\DailyMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyMessageController extends Controller
{
    /**
     * Display today's daily dose.
     */
    public function show()
    {
        // Use Carbon to get today's date
        $today = Carbon::today()->toDateString();

        // Find today's message or fallback to a default message
        $dailyMessage = DailyMessage::where('date', $today)->first();
        $message = $dailyMessage ? $dailyMessage->message : "No message for today yet—keep grinding, legend!";

        return view('daily-dose.show', compact('message'));
    }
}
