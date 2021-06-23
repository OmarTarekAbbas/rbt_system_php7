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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('notify:endrbtcontent')
                 ->daily();

        $schedule->command('notify:endcontractrenew')
                 ->daily();
        $schedule->command('notify:roadmapstartdate')
                 ->daily();

       $schedule->command('contract:auto_renew')
                 ->daily();


        $schedule->command('notify:endcontract')->weeklyOn(1, '8:00'); //weekly each monday  at 10:00
        $schedule->command('notify:attachments')->weeklyOn(1, '08:15'); //weekly each monday at 10:15

        // $schedule->command("queue:work --tries=3  --daemon");

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        
        require base_path('routes/console.php');
    }
}
