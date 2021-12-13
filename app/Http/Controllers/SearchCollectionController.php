<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\PaymentSequence;
use Illuminate\Database\Eloquent\Builder;

class SearchCollectionController extends Controller
{
    public function search(Request $request){
        if (isset($_GET['searchvalue'])){
            $search_text = $_GET['searchvalue'];

            $result_loan_id = Borrower::where('loan_id', $search_text)->get();
            $result_fullname = Borrower::where('fullname', $search_text)->get();
            $result_email = Borrower::where('email', $search_text)->get();
            $result_nric = Borrower::where('nric', $search_text)->get();
            $result_total_loan = Borrower::where('finance_amount', $search_text)->get();
            $result_current_payment_seq = PaymentSequence::whereHas('borrower', function(Builder $query) use($search_text){
                $query->where('current_payment_seq', '=', $search_text);
            })->get();
            $result_payment_ammount = PaymentSequence::whereHas('borrower', function(Builder $query) use($search_text){
                $query->where('ammount', '=', $search_text);
            })->get();
            $result_payment_method = PaymentSequence::whereHas('borrower', function(Builder $query) use($search_text){
                $query->where('payment_method', '=', $search_text);
            })->get();
            $result_mark = PaymentSequence::whereHas('borrower', function(Builder $query) use($search_text){
                $query->where('mark', '=', $search_text);
            })->get();
            $result_status = PaymentSequence::whereHas('borrower', function(Builder $query) use($search_text){
                $query->where('status', '=', $search_text);
            })->get();
        } else {
            $result = Borrower::all();
        }
        
        if($result_loan_id->first()){
            $result = $result_loan_id;
        }
        if($result_fullname->first()){
            $result = $result_fullname;
        }
        if($result_email->first()){
            $result = $result_email;
        }
        if($result_nric->first()){
            $result = $result_nric;
        }
        if($result_total_loan->first()){
            $result = $result_total_loan;
        }
        if($result_current_payment_seq->first()){
            $result = $result_current_payment_seq;
        }
        if($result_payment_ammount->first()){
            $result = $result_payment_ammount;
        }
        if($result_payment_method->first()){
            $result = $result_payment_method;
        }
        if($result_mark->first()){
            $result = $result_mark;
        }
        if($result_status->first()){
            $result = $result_status;
        }
        return view('collection.index', ['detailPayment' => $result]);
    }
}
