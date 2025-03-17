<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\SendEmails::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // ユーザ数集計
        $schedule->command('app:sendEmails')->dailyAt('17:00');
    }
}
