<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CountryDetail;
use App\Notifications\BorrowerConfirmationNotification;
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
    $country = CountryDetail::all();
    return view('auth.register', compact('country'));
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
      "pay_slips" => ["array", "required", "min:3", "max:3"],
      "pay_slips.*" => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
      "bank_statements" => ["array", "required", "min:3", "max:3"],
      "bank_statements.*" => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
      "utilities_slip"  => ["required", "file", 'max: 10240', 'mimes:jpg,png,jpeg,pdf'],
      'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
    ]);

    # Process the data
    $data['email']            = htmlspecialchars(strip_tags($request->email));
    $data['loan_id']          = uniqid();
    $data['finance_amount']   = (int) htmlspecialchars(strip_tags($request->finance_amount));
    $data['period']           = htmlspecialchars(strip_tags($request->period));
    $data['fullname']         = htmlspecialchars(strip_tags($request->fullname));
    $data['nric']             = htmlspecialchars(strip_tags($request->nric));
    $data['birthdate']        = htmlspecialchars(strip_tags($request->birth_date));
    $data['dependants']       = htmlspecialchars(strip_tags($request->dependants));
    $data['employment']       = htmlspecialchars(strip_tags($request->employment));
    $data['phone']            = htmlspecialchars(strip_tags($request->phone_prefix)) . htmlspecialchars(strip_tags($request->phone));

    $utilities = $request->utilities_slip;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['utilities_slip']   = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();
    session(['utilities_slip' => 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension()]);

    $utilities = $request->id_back;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_back']          = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();
    session(['id_back' => 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension()]);

    $utilities = $request->id_front;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_front']         = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();
    session(['id_front' => 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension()]);
    
    if($request->has('pay_slips')){
      $data['salary_slip'] = "";
      $count = 0;
      foreach($request->file('pay_slips') as $file){
        $file->move(public_path('upload'), time().'_'.md5(now()).'.'.$file->getClientOriginalExtension());
        $data['salary_slip'] .= 'upload/'.time().'_'.md5(now()).'.'.$file->getClientOriginalExtension();
        if($count < 2){
          $data['salary_slip'] .= ',';  
        }
        $count += 1;
      }
      session(['salary_slip' => $data['salary_slip']]);
    }

    if($request->has('bank_statements')){
      $data['bank_statement'] = "";
      $count = 0;
      foreach($request->file('bank_statements') as $file){
        $file->move(public_path('upload'), time().'_'.md5(now()).'.'.$file->getClientOriginalExtension());
        $data['bank_statement'] .= 'upload/'.time().'_'.md5(now()).'.'.$file->getClientOriginalExtension();
        if($count < 2){
          $data['bank_statement'] .= ',';
        }
        $count += 1;
      }
      session(['bank_statement' => $data['bank_statement']]);
    }

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
    
    $data->notify(new BorrowerConfirmationNotification($mailData, $receiver));

    # Redirect to success onboarding
    return redirect()->route('register.success');
  }
}
