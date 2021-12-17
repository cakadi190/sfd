<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BorrowerController;
use App\Http\COntrollers\OverdueController;
use App\Models\Borrower;
use App\Models\PaymentSequence;
use Carbon\Carbon;


class TestingFunctionality extends Controller
{
    private function checkForDueDate($date){
        // Parsing date class into day, month, and year
        $date = $date->addMonths(1);
        $day = (int)$date->day;
        $month = (int)$date->month;
        $year = (int)$date->year;

        // Checking maximum day at particular month & year
        if($month <= 7){
            if($month % 2 != 0){
                $due_day = 31;
            }else{
                if($month == 2){
                    if($year % 4 != 0 && $year % 400 != 0){
                        $due_day = 29;
                    }else{
                        $due_day = 28;
                    }
                }else{
                    $due_day = 30;
                }
            }
        }else{
            if($month % 2 != 0){
                $due_day = 30;
            }else{
                if($month == 2){
                    if($year % 4 != 0 && $year % 400 != 0){
                        $due_day = 29;
                    }else{
                        $due_day = 28;
                    }
                }else{
                    $due_day = 31;
                }
            }
        }

        $day = ($day > $due_day) ? $due_day : $day;
        return $year.'-'.$month.'-'.$day;
    }

    public function checkForOverdue($date, $is_success){
        $day_due_date = $date->day;
        $month_due_date = $date->month;
        $year_due_date = $date->year;

        $current_date = Carbon::now();
        if(!$is_success){
            $current_date = $date->addDays(3);
        }
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

    public function index(){

    }

    public function success($loan_id){
        $borrower = Borrower::where('loan_id', $loan_id)->first();
        if(!$borrower){
            return abort(404);
        }
        $payment_seq = $borrower->payment_seq()->get()->last();
        
        $due_date = $this->checkForDueDate($payment_seq->due_date);
        $borrower->due_date = $due_date;
        $borrower->save();

        $is_overdue = $this->checkForOverdue($payment_seq->due_date);
        $payment_seq->paid_at = Carbon::now();
        $payment_seq->payment_method = 'Bank Transfer';
        $payment_seq->status = ($is_overdue) ? "overdue" : "paid";
        $payment_seq->officer = 'SandBox';
        $payment_seq->remark = 'Awesome';
        $payment_seq->file_receipt = 'oke.jpg';
        $payment_seq->save();
        
        if(($payment_seq->current_payment_seq + 1) <= $payment_seq->max_payment_seq){
            $data_new_payment_seq = [
                'borrower_loan_id' => $borrower->loan_id,
                'current_payment_seq' => ($payment_seq->current_payment_seq + 1),
                'max_payment_seq' => $payment_seq->max_payment_seq,
                'ammount' => ($borrower->finance_amount * 0.18 * $borrower->finance_amount) + ($borrower->finance_amount / ($borrower->finance_amount * 12)),
                'due_date' => $due_date,
                'status' => "pending",
            ];
            $new_payment_seq = PaymentSequence::create($data_new_payment_seq);
        }

        return "Success";
    }
    public function overdue($loan_id){
        $borrower = Borrower::where('loan_id', $loan_id)->first();
        if(!$borrower){
            return abort(404);
        }
        $payment_seq = $borrower->payment_seq()->get()->last();
        
        $due_date = $this->checkForDueDate($payment_seq->due_date);
        $borrower->status = 'On Payment Sequence';
        $borrower->due_date = $due_date;
        $borrower->save();

        $is_overdue = $this->checkForOverdue($payment_seq->due_date, false);
        $payment_seq->paid_at = Carbon::now();
        $payment_seq->payment_method = 'Bank Transfer';
        $payment_seq->status = ($is_overdue) ? "overdue" : "paid";
        $payment_seq->officer = 'SandBox';
        $payment_seq->remark = 'Awesome';
        $payment_seq->file_receipt = 'oke.jpg';
        $payment_seq->is_late = true;
        $payment_seq->late_charge = ($payment_seq->ammount * 0.08) * (($payment_seq->due_date)->addDays(3)->diffInDays($payment_seq->due_date) / 365);
        $payment_seq->save();
        
        if(($payment_seq->current_payment_seq + 1) <= $payment_seq->max_payment_seq){
            $data_new_payment_seq = [
                'borrower_loan_id' => $borrower->loan_id,
                'current_payment_seq' => ($payment_seq->current_payment_seq + 1),
                'max_payment_seq' => $payment_seq->max_payment_seq,
                'ammount' => ($borrower->finance_amount * 0.18 * $borrower->finance_amount) + ($borrower->finance_amount / ($borrower->finance_amount * 12)),
                'due_date' => $due_date,
                'status' => "pending",
            ];
            $new_payment_seq = PaymentSequence::create($data_new_payment_seq);
        }

        return "Success";
    }
}
