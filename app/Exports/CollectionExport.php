<?php

namespace App\Exports;

use App\Models\Borrower;
use Maatwebsite\Excel\Concerns\FromCollection;

class CollectionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
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
                $item['payment_ammount'] = round($bc->ammount, 2);
                $item['due_date'] = ($bc->due_date) ? $bc->due_date->toFormattedDateString() : '-';
                $item['paid_at'] = ($bc->paid_at) ? $bc->paid_at->toFormattedDateString() : '-';
                $item['payment_method'] = ($bc->payment_method) ? $bc->payment_method : '-';
                $item['officer'] = ($bc->officer) ? $bc->officer : '-';
                if($bc->status == 'pending'){
                    $item['status'] = "Pending";
                }else if($bc->status == 'paid'){
                    $item['status'] = "Paid";
                }else {
                    $item['status'] = "Overdue";
                }
                $all_collection[] = $item;
            }
        }

        return $all_collection;
    }
}
