<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class CollectionController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $borrower = Borrower::all();
        $all_collection = array();
        foreach($borrower as $b){
            $borrower_collection = $b->payment_seq()->get()->all();
            foreach($borrower_collection as $bc){
                $item = array();
                $item['loan_id'] = $b->loan_id;
                $item['fullname'] = $b->fullname;
                $item['email'] = $b->email;
                $item['nric'] = $b->nric;
                $item['total_loan'] = $b->finance_amount;
                $item['current_payment_seq'] = $bc->current_payment_seq;
                $item['max_payment_seq'] = $bc->max_payment_seq;
                $item['payment_ammount'] = $bc->ammount;
                $item['due_date'] = ($bc->due_date) ? $bc->due_date : '-';
                $item['paid_at'] = ($bc->paid_at) ? $bc->paid_at : '-';
                $item['payment_method'] = ($bc->payment_method) ? $bc->payment_method : '-';
                $item['officer'] = ($bc->officer) ? $bc->officer : '-';
                if($bc->status == 'pending'){
                    $item['status'] = "Pending";
                }else if($bc->status == 'paid'){
                    $item['status'] = "Paid";
                }else {
                    // if($bc->is_late){
                    //     $item['status'] = "Overdue";
                    // }else{
                    //     $item['status'] = "Paid Overdue";
                    // }
                    $item['status'] = "Overdue";
                }
                $all_collection[] = $item;
            }
        }
        return view('collection.index', ['collection' => $all_collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collection.create');
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
