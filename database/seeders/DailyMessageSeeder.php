<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyMessage;
use Carbon\Carbon;

class DailyMessageSeeder extends Seeder
{
    public function run()
    {
        $quotes = [
            'Every challenge is an opportunity—embrace the grind and shine!',
            'Your future is created by what you do today—get after it!',
            'Hard work beats talent when talent doesn’t work hard.',
            'Stay focused, stay humble, and keep grinding!',
            'Believe in yourself—great things take time!',
            'Dream big, work hard, and keep pushing forward.',
            'Your only limit is you. Break barriers and set new goals!'
        ];

        $startDate = Carbon::today();

        foreach ($quotes as $index => $quote) {
            DailyMessage::updateOrCreate(
                ['date' => $startDate->copy()->addDays($index)->toDateString()],
                ['message' => $quote]
            );
        }
    }
}
