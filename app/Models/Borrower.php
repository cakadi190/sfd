<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrower extends Model
{
    use HasFactory, Notifiable;

    protected $table = "borrowers";

    protected $fillable = [
		'email',
		'loan_id',
		'finance_amount',
		'period',
		'fullname',
		'nric',
		'birthdate',
		'dependants',
		'employment',
		'phone',
		'utilities_slip',
		'id_back',
		'id_front',
		'salary_slip',
    ]
}
