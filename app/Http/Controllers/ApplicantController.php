<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\RejectedApplicant;
use App\Models\PaymentSequence;
use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Notifications\BorrowerRejectionNotification;
use App\Notifications\EMandateEmailNotification;

class ApplicantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $applicants = Applicant::all();
    return view('applicant.index')->withApplicants($applicants);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('applicant.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      "finance_ammount" => "required",
      "period"          => "required",
      "purpose"         => "required",
      "fullname"        => "required",
      "nric"            => "required",
      "email"           => "required", "email",
      "phone_prefix"    => "required",
      "phone"           => "required",
      "date"            => "required",
      "tax"             => "required",
      "employment"      => "required",
      "dependants"      => "required",
      "id_front"        => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "id_back"         => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "salary_slip"     => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "utilities_slip"  => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "g-recaptcha-response" => "required|recaptchav3:register,0.5"
    ]);

    $data['loan_id']          = uniqid('loan-');
    $data['finance_ammount']  = htmlspecialchars(strip_tags($request->finance_ammount));
    $data['period']           = htmlspecialchars(strip_tags($request->period));
    $data['fullname']         = htmlspecialchars(strip_tags($request->fullname));
    $data['nric']             = htmlspecialchars(strip_tags($request->nric));
    $data['birthdate']        = htmlspecialchars(strip_tags($request->date));
    $data['dependants']       = htmlspecialchars(strip_tags($request->dependants));
    $data['employment']       = htmlspecialchars(strip_tags($request->employment));
    $data['phone']            = htmlspecialchars(strip_tags($request->phone_prefix)) . htmlspecialchars(strip_tags($request->phone));

    $utilities = $request->utilities_slip;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['utilities_slip'] = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->id_back;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_back'] = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->id_front;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['id_front'] = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    $utilities = $request->salary_slip;
    $utilities->move(public_path('upload'), time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension());
    $data['salary_slip'] = 'upload/' . time() . '_' . md5(now()) . '.' . $utilities->getClientOriginalExtension();

    Applicant::create($data);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $applicant = Applicant::findOrFail($id);
    if($applicant->delete()){
      return 'Applicant has been deleted';
    }
    else{
      return 'Error, check your connection and try again!';
    }
  }

  public function sendRejectionEmail($id, Request $request){
    $request->validate([
      'subjectEmail' => 'required',
      'bodyEmail' => 'required'
    ]);

    // Find selected applicant based on 'id', then update the status
    $applicant = Applicant::findOrFail($id);
    $applicant->status = 'canceled';
    $applicant->save();

    // $receiver = $applicant->email; // Line code for production
    $receiver = 'rakha.rozaqtama@gmail.com'; // Line code for testing
    $mailData = [
      'fullname' => $applicant->fullname,
      'subject_email' => htmlspecialchars(strip_tags($request->subjectEmail)),
      'body_email' => htmlspecialchars(strip_tags($request->bodyEmail)),
    ];

    //Storing data on the database table
    $data_db['applicants_id'] = $applicant->id;
    $data_db['reject_reason'] = $mailData['body_email'];
    $data_db['reject_status'] = $mailData['subject_email'];
    RejectedApplicant::create($data_db); 

    // Sending Email Notification using Laravel Queues
    dispatch(function() use ($mailData, $receiver, $applicant) {
      $applicant->notify(new App\Notifications\BorrowerRejectionNotification($mailData, $receiver));
    });

    $sessionMsg = 'Selected Applicant has been rejected';

    // Redirect with message
    return redirect('/dashboard/applicant')->with('message', $sessionMsg);
  }

  public function activatingEMandate($applicant){
    $receiver = 'rakha.rozaqtama@gmail.com'; // Code for mail testing
    // $receiver = $applicant->email; // Code for mail production
    $mailData = [
        'fullName' => $applicant->fullname,
        'loanAmount' => $applicant->finance_amount,
        'urlAuthorized' => 'https://www.quora.com/',
        'urlRegister' => 'https://www.quora.com/',
        'phoneNumber' => $applicant->phone,
    ];

    dispatch(function() use ($mailData, $receiver, $applicant){
        $applicant->notify(new App\Notifications\EMandateEmailNotification($mailData, $receiver));
    });
  }

  public function getDataModalApprove($id){
    $applicant = Applicant::find($id);
    return view('applicant._modal_approve', compact('applicant'));
  }

  public function approveApplicant($id){
    //Storing selected applicant data into 'borrowers' table
    $applicant = Applicant::findOrFail($id);
    $data_borrower = [
      'email' => $applicant->email,
      'loan_id' => $applicant->loan_id,
      'finance_amount' => $applicant->finance_amount,
      'period' => $applicant->period,
      'fullname' => $applicant->fullname,
      'nric' => $applicant->nric,
      'birthdate' => $applicant->birthdate,
      'dependants' => $applicant->dependants,
      'employment' => $applicant->employment,
      'phone' => $applicant->phone,
      'utilities_slip' => $applicant->utilities_slip,
      'id_back' => $applicant->id_back,
      'id_front' => $applicant->id_front,
      'salary_slip' => $applicant->salary_slip,
      'status' => "waiting",
    ];
    $borrower = Borrower::create($data_borrower);

    if($data_borrower['period'] == 'annually'){
      $max_payment = 1;
    }else if($data_borrower['period'] == 'binneally'){
      $max_payment = 2;
    }else if($data_borrower['period'] == 'trienally'){
      $max_payment = 3;
    }else if($data_borrower['period'] == 'quadrennially'){
      $max_payment = 4;
    }else{
      $max_payment = 5;
    }

    $payment_seq_data = [
      'borrower_loan_id' => $applicant->loan_id,
      'current_payment_seq' => 1,
      'max_payment_seq' => $max_payment,
      'ammount' => ($data_borrower['finance_amount'] * 0.18 * $max_payment) + ($data_borrower['finance_amount'] / ($max_payment * 12)),
    ];
    $payment_seq = PaymentSequence::create($payment_seq_data);

    $this->activatingEMandate($applicant);

    // Destroy selected applicant from 'applicants' table
    $deleteStatus = $applicant->delete();

    // Build particular message based on database condition
    if($deleteStatus){
      $sessionMsg = 'Selected Applicant Successfuly Approved';
    }else {
      $sessionMsg = 'Error Approving Data. Check Your Connection & Try Again!';
    }
    
    // Redirect with message
    return redirect('/dashboard/applicant')->with('message', $sessionMsg);
  }


  public function getDataModalDetail($id){
    $applicant = Applicant::findOrFail($id);
    return view('applicant._modal_detail', compact('applicant'));
  }


  public function getDataModalReject($id){
    $applicant = Applicant::findOrFail($id);
    $mailData = $applicant->rejected_applicants()->get()->first();
    if ($mailData) {
      $data = [
        'is_rejected' => true,
        'applicant' => $applicant,
        'subject_email' => $mailData->reject_status,
        'body_email' => $mailData->reject_reason,
      ];
    } else {
      $data = [
        'is_rejected' => false,
        'applicant' => $applicant,
      ];
    }
    return view('applicant._modal_reject', ['data' => $data]);
  }
}
