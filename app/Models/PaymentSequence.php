<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrower;

class PaymentSequence extends Model
{
    protected $table = 'payment_sequence';

    use HasFactory;    

    protected $fillable = [
        'borrower_loan_id',
        'current_payment_seq',
        'max_payment_seq',
        'ammount',
        'due_date',
        'paid_at',
        'payment_method',
        'mark',
        'status',
    ];

    public function borrower(){
        return $this->belongsTo(Borrower::class, 'borrower_loan_id', 'loan_id');
    }
}
