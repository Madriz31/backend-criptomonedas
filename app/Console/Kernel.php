<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Aquí defines los comandos programados
        $schedule->command('archive:crypto-data')->daily(); // por ejemplo, diario
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
