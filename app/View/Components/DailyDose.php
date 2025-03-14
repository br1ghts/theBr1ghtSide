<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DailyDose extends Component
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('components.daily-dose');
    }
}
