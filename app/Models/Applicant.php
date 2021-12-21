<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\RejectedApplicant;

class Applicant extends Model
{
    use HasFactory, Notifiable;

    protected $table = "applicants";

    protected $fillable = [
        'loan_id',
        'finance_amount',
        'period',
        'fullname',
        'nric',
        'email',
        'phone',
        'birthdate',
        'dependants',
        'employment',
        'id_front',
        'id_back',
        'salary_slip',
        'bank_statement',
        'utilities_slip',
        'status'
    ];

    protected $guarded = [];

    public function rejected_applicants(){
        return $this->hasOne(RejectedApplicant::class, 'applicants_id', 'id');
    }
}
