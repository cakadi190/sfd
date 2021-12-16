<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class LateChangeController extends Controller
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

    private function checkForOverdue($borrower){
        $collections = $borrower->payment_seq()->get()->all();
        foreach($collections as $c){
            if($c->is_late){
                return true;
            }
        }
        return false;
    }

    private function checkForLateCharge($borrower){
        $collections = $borrower->payment_seq()->get()->all();
        foreach($collections as $c){
            if($c->is_late){
                return $c->late_charge;
            }
        }
        return 0;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = Borrower::all();
        $data_late_charge = array();
        foreach($borrowers as $b){
            if($this->checkForOverdue($b)){
                $item = array();
                $item['id'] = $b->id;
                $item['date_time'] = $b->disbursed_at->toFormattedDateString();
                $item['loan_id'] = $b->loan_id;
                $item['status'] = "Overdue";
                $item['name'] = $b->fullname;
                $item['finance_ammount'] = $b->finance_amount;
                $item['late_charge'] = $this->checkForLateCharge($b);
                $item['installment'] = $b->payment_seq()->get()->all();
                $data_late_charge[] = $item;
            }
        }
        return view('late.index', ['data' => $data_late_charge]);
    }

    public function modalDetailInstallment($id){
        $borrower = Borrower::findOrFail($id);
        $collections = $borrower->payment_seq()->get()->all();
        $data_all_installment = array();
        foreach($collections as $c){
            $item = array();
            $item['count_installment'] = $c->current_payment_seq;
            $item['status'] = ($c->is_late) ? "Overdue" : $c->status;
            $item['ammount'] = round($c->ammount, 2);
            $item['due_date'] = $c->due_date->toFormattedDateString();

            $data_all_installment[] = $item;
        }

        /* ==== Generating All Instalment Sequence ==== */
        if($collections[count($collections) - 1]->current_payment_seq < $collections[count($collections) - 1]->max_payment_seq){
            $count_due_date = $collections[count($collections) - 1]->due_date;
            $payment_seq_queue = $collections[count($collections) - 1]->max_payment_seq - $collections[count($collections) -1]->current_payment_seq;
            $count_installment = $collections[count($collections) - 1]->current_payment_seq;
            $counter = 0;
            while($counter < $payment_seq_queue){
                $item = array();
                $count_installment += 1;
                $item['count_installment'] = $count_installment;
                $item['status'] = "Pending";
                $item['ammount'] = round($collections[count($collections) - 1]->ammount, 2);
                $item['due_date'] = $count_due_date->addDays(30)->toFormattedDateString();

                $data_all_installment[] = $item;
                $counter += 1;
            }
        }
        

        return view('late._modal_detail_instalment', compact('data_all_installment'));
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
