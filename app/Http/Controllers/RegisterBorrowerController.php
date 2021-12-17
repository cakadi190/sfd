<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class RegisterBorrowerController extends Controller
{
  /**
   * Showing the Form for Register
   *
   * @return Illuminate\Support\Facades\View
   */
  public function register()
  {
    return view('auth.register');
  }

  /**
   * Processing data
   *
   * @return void
   */
  public function process(Request $request)
  {
    $this->validate($request, [
      "finance_amount"  => ["required"],
      "period"          => ["required"],
      "purpose"         => ["required"],
      "fullname"        => ["required"],
      "nric"            => ["required"],
      "email"           => ["required", "email"],
      "phone_prefix"    => ["required"],
      "phone"           => ["required"],
      "agree"           => ['accepted'],
      "birth_date"      => ["required"],
      "tax"             => ["required"],
      "employment"      => ["required"],
      "dependants"      => ["required"],
      "id_front"        => ["required", 'file', 'max:10240', 'mimes:jpg,png,jpeg,pdf'],
      "id_back"         => ["required", 'file', 'max:10240', 'mimes:jpg,png,jpeg,pdf'],
      "salary_slip"     => ["required", 'file', 'max:10240', 'mimes:jpg,png,jpeg,pdf'],
      "utilities_slip"  => ["required", 'file', 'max:10240', 'mimes:jpg,png,jpeg,pdf'],
    ]);

    # Process the data
    $data['email']            = htmlspecialchars(strip_tags($request->email));
    $data['loan_id']          = uniqid('loan-');
    $data['finance_amount']   = (int) htmlspecialchars(strip_tags($request->finance_amount));
    $data['period']           = htmlspecialchars(strip_tags($request->period));
    $data['fullname']         = htmlspecialchars(strip_tags($request->fullname));
    $data['nric']             = htmlspecialchars(strip_tags($request->nric));
    $data['birthdate']        = htmlspecialchars(strip_tags($request->birth_date));
    $data['dependants']       = htmlspecialchars(strip_tags($request->dependants));
    $data['employment']       = htmlspecialchars(strip_tags($request->employment));
    $data['phone']            = htmlspecialchars(strip_tags($request->phone_prefix)) . htmlspecialchars(strip_tags($request->phone));
    // dd($data);

    $utilities = $request->utilities_slip;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['utilities_slip']   = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->id_back;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_back']          = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->id_front;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_front']         = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->salary_slip;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['salary_slip']      = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    # Insert it to database
    $data = Applicant::create($data);

    # Set Data Periode ==================================
    $period = [
      'annually'      => 1,
      'binneally'     => 2,
      'trienally'     => 3,
      'quadrennially' => 4,
      'quinquenially' => 5,
    ];
    # Set Data Periode ==================================

    # Send email
    $sendData     = $data->toArray();
    $receiver     = $sendData['email'];
    $phoneNumber  = $sendData['phone'];
    $mailData     = [
      'fullName'        => $sendData['fullname'],
      'loanAmount'      => $sendData['finance_amount'],
      'timeEstimation'  => (int) ($period[$sendData['period']] * 12), # <<< For this
      'phoneNumber'     => $phoneNumber,
    ];
    
    dispatch(function() use ($mailData, $receiver, $data){
      $data->notify(new \App\Notifications\BorrowerConfirmationNotification($mailData, $receiver));
    });

    # Redirect to success onboarding
    return redirect()->route('register.success');
  }
}
