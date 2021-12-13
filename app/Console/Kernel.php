<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\Borrower;

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


    public function checkForOverdue($date){
        $day_due_date = $date->day;
        $month_due_date = $date->month;
        $year_due_date = $date->year;

        $current_date = Carbon::now();
        $current_day = $current_date->day;
        $current_month = $current_date->month;
        $current_year = $current_date->year;

        if($current_year > $year_due_date){
            return 1;
        }
        if($current_year == $year_due_date){
            if($current_month > $month_due_date){
                return 1;
            }else if ($current_month == $month_due_date){
                if($current_day > $day_due_date){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $payment_seq = PaymentSequence::all();
            foreach($payment_seq as $p){
                $is_overdue = checkForOverdue($p->due_date);
                if($is_overdue){
                    $p->status = 'overdue';
                }
                $p->save();
            }
        })->daily();
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
