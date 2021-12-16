<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
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
        $data_collection_overdue = array();
        foreach($borrowers as $b){
            $data_collection = $b->payment_seq()->get()->all();
            foreach($data_collection as $d){
                $item = array();
                if($d->is_late){
                    $item['date_joined'] = $b->disbursed_at->toFormattedDateString();
                    $item['date_overdue'] = $d->due_date->toFormattedDateString();
                    $item['name'] = $b->fullname;
                    $item['nric'] = $b->nric;
                    $item['phone'] = $b->phone;
                    $item['email'] = $b->email;
                    $item['day_overdue'] = Carbon::now()->diffInDays($d->due_date);
                    $item['late_charge'] = round(($b->payment_seq()->get()->first()->ammount * 0.08) * (Carbon::now()->diffInDays($d->due_date) / 365), 2);
                    $item['waived'] = 0;
                    $data_collection_overdue[] = $item;
                }
            }
        }
        return view('overdue.index', ['data' => $data_collection_overdue]);
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
