<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\PaymentSequence;

class Borrower extends Model
{
    use HasFactory, Notifiable;

	/**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        // return $this->email;
		return "rakha.rozaqtama@gmail.com";
    }

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
	];

	protected $dates = [
		'disbursed_at',
		'due_date',
	];

	public function payment_seq(){
		return $this->hasMany(PaymentSequence::class, 'borrower_loan_id' ,'loan_id');
	}
}
