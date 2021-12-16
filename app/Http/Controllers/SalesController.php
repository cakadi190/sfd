<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Borrower;
use App\Models\PaymentSequence;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    private function parsingDateFromRange($from, $to){
        $value = 0;
        if(Carbon::createFromDate($from->year, $from->month, $from->day)->toDateTimeString() == Carbon::createFromDate(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day)){
            $value = false;
        }else {
            if(Carbon::createFromDate($to->year, $to->month, $to->day)->toDateTimeString() > Carbon::createFromDate(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day)) {
                $value =  false;
            }else if(Carbon::createFromDate($to->year, $to->month, $to->day)->toDateTimeString() == Carbon::createFromDate(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day)){
                $value =  true;
            }
        }
        return $value;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstApplicant = Applicant::first();
        $row = array();
        if($firstApplicant){
            $firstDate = $firstApplicant->created_at;
            $nextDate = $firstApplicant->created_at->addDays(7);
            if($this->parsingDateFromRange($firstDate, $nextDate)){
                while($this->parsingDateFromRange($firstDate, $nextDate)){
                    $item = array();
                    $item['week'] = $firstDate->toFormattedDateString().' - '.$nextDate->toFormattedDateString();
                    $item['total_applications'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->get());
                    $item['total_loan_applied'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "pending")->get()) + count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "pending")->get());
                    $item['total_loan_approve'] = count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->get());
                    $item['total_loan_rejected'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "canceled")->get());
                    $item['total_loan_disbursed'] = count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "!=","pending")->get());
                    $item['total_bad_debt'] = count(PaymentSequence::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("is_late", true)->get());
        
                    $row[] = $item;
        
                    $firstDate = $nextDate;
                    $nextDate = $nextDate->addDays(7);
                }
            }else {
                $item = array();
                $item['week'] = $firstDate->toFormattedDateString().' - '.$nextDate->toFormattedDateString();
                $item['total_applications'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->get());
                $item['total_loan_applied'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "pending")->get()) + count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "pending")->get());
                $item['total_loan_approve'] = count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->get());
                $item['total_loan_rejected'] = count(Applicant::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "canceled")->get());
                $item['total_loan_disbursed'] = count(Borrower::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("status", "!=", "pending")->get());
                $item['total_bad_debt'] = count(PaymentSequence::whereBetween("created_at", [$firstDate->addDays(-1), $nextDate])->where("is_late", true)->get());
        
                $row[] = $item;
            }
        }
        return view('sales.index', ['data' => $row]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
