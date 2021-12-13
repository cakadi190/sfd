<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\PaymentSequence;
use Carbon\Carbon;

class OverdueInstallmentController extends Controller
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
    public function index()
    {
        $borrowers = Borrower::all();
        $userOverdue = [];
        $current_date = Carbon::now();

        foreach($borrowers as $b){
            if($b->payment_seq()->get()->first()->status == 'overdue'){
                $day_overdue = $current_date->diffInDays($b->payment_seq()->get()->first()->due_date);
                $item = [
                    'borrower' => $b,
                    'payment_sequence' => $b->payment_seq()->get()->first(),
                    'overdue' => $day_overdue,
                    'late_charge' => ($b->payment_seq()->get()->first()->ammount * 0.08) * ($day_overdue / 365),
                    'waived' => 0,
                ];
                $userOverdue[] = $item;
            }
        }
        // dd($userOverdue);
        return view('overdue.index', ['data' => $userOverdue]);
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
