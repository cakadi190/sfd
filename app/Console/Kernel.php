<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\PaymentSequence;

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
            return true;
        }
        if($current_year == $year_due_date){
            if($current_month > $month_due_date){
                return true;
            }else if ($current_month == $month_due_date){
                if($current_day > $day_due_date){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
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
            $payment_seq = PaymentSequence::where("status", "pending")->get(); 
            foreach($payment_seq as $p){
                $is_overdue = $this->checkForOverdue($p->due_date);
                if($is_overdue){
                    $p->is_late = true; 
                    $current_date = Carbon::now();
                    $late_day = $current_date->diffInDays($p->due_date);
                    $sequence_ammount = $p->ammount - $p->late_charge;
                    $p->late_charge = round((($sequence_ammount * 0.08) * ($late_day / 365)), 2);
                }
                $p->save();
            }
        })->everyMinute();
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
