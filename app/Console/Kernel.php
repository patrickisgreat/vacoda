<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\ClearBeanstalkdQueue::class,
        Commands\DumpPomsProd::class,
        //Commands\StorageLinkCommand::class,
        Commands\AutoArchive::class,
        Commands\AutoArchiveNotify::class,
        Commands\SyncImpressionTracking::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('auto-archive')
                  ->weekly()->saturdays()->at('1:00');

        $schedule->command('auto-archive-notify')
            ->weekly()->sundays()->at('17:00');
    }
}
