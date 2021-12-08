<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Applicant extends Model
{
    use HasFactory;
=======
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
  use HasFactory, Notifiable;

  protected $guarded = [];
>>>>>>> refs/remotes/origin/main
}
