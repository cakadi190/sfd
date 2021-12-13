<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class RejectedApplicant extends Model
{
    protected $table = 'rejected_applicants';
    use HasFactory;

    protected $fillable = [
        'applicants_id', 'reject_reason', 'reject_status'
    ];

    public function applicant(){
        return $this->belongsTo(Applicant::class, 'applicants_id', 'id');
    }
}
