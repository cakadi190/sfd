<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\RejectedApplicant;

class Applicant extends Model
{
  use HasFactory, Notifiable;

  protected $table= "applicants";

  protected $guarded = [];

  public function rejected_applicants(){
    return $this->hasOne(RejectedApplicant::class, 'applicants_id', 'id');
  }
}
