<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Services\TasaBCV;
use App\Models\Tasa;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $service = new TasaBCV();
            $data = $service->getTasaActivaHoy();

            //dd($data);
    
            if (isset($data[0]['tasa'], $data[0]['effective_date'])) {
                Tasa::updateOrCreate(
                    ['fecha' => $data[0]['effective_date']],
                    ['valor' => $data[0]['tasa']]
                );
            }
        })->everyMinute(); // cada hora
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
