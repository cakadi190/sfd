<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrower extends Model
{
    use HasFactory, Notifiable;

    protected $table = "borrowers";

    protected $guarded = [];
}
