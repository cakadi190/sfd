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
        'created_at','updated_at','loan_id','finance_amount','period','fullname','nric','email','phone','birthdate','dependants','employment','id_front','id_back','salary_slip','utilities_slip'
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'remember_token',
        'email_verified_at'
    ];

    protected $guarded = [];
}
