<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\PaymentSequence;
use Illuminate\Http\Request;
use App\Notifications\BorrowerConfirmationNotification;
use App\Notifications\FollowUpEmailNotification;
use App\Notifications\BlackListNotification;
use App\Notifications\MonthlyStatementNotification;
use Carbon\Carbon;

class BorrowerController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth', 'verified']);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $borrowers = Borrower::all();

    // get current date
    $current_date = Carbon::now();
    $current_day = (int)Carbon::now()->day;
    $current_month = (int)Carbon::now()->month;
    $current_year = (int)Carbon::now()->year;


    $data = array();
    foreach ($borrowers as $borrower) {
      $item = [];

      /*
                Due Date Calculation
             */
      $current_payment_seq = $borrower->payment_seq()->get()->first()->current_payment_seq;
      if ($borrower->due_date) {
        $due_date = Carbon::createFromDate($borrower->due_date);
        $day_due_date = (int)Carbon::createFromDate($borrower->due_date)->day;
        $month_due_date = (int)Carbon::createFromDate($borrower->due_date)->month;
        $year_due_date = (int)Carbon::createFromDate($borrower->due_date)->year;
        if ($current_year == $year_due_date) {
          $count_due_date = $current_date->diffInDays($due_date);
          if ($count_due_date == 14) {
            $item['is_payment_due'] = true;
            $item['note'] = $count_due_date . ' days left to due date Sequence Payment ' . $current_payment_seq;
          } else {
            $item['is_payment_due'] = false;
            $item['note'] = $count_due_date . ' days left to due date Sequence Payment ' . $current_payment_seq;
          }
        } else if ($current_year > $year_due_date) {
          $count_due_date = $current_date->diffInDays($due_date);
          $item['is_payment_due'] = true;
          $item['note'] = 'Sequence Payment ' . $current_payment_seq . ' Overdue ' . $count_due_date;
        } else {
          $item['is_payment_due'] = false;
          $item['note'] = 'Waiting for Sequence Payment ' . $current_payment_seq;
        }
      } else {
        $item['is_payment_due'] = false;
        $item['note'] = 'Borrower doesn\'t receive loan yet';
      }

      $item['id'] = $borrower->id;
      $item['loan_id'] = $borrower->loan_id;
      $item['finance_ammount'] = $borrower->finance_amount;
      $item['created_at'] = $borrower->created_at;
      $item['status'] = $borrower->status;
      $data[] = $item;
    }
    return view('borrower.index', ['borrowers' => $data]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'email'           => 'required|email',
      'loan_id'         => 'required',
      'finance_amount'  => 'required',
      'period'          => 'required',
      'fullname'        => 'required',
      'nric'            => 'required',
      'birthdate'       => 'required',
      'dependants'      => 'required',
      'employment'      => 'required',
      'phone'           => 'required',
      "utilities_slip"  => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "salary_slip"     => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "id_back"         => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
      "id_front"        => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
    ]);

    $data['loan_id']        = htmlspecialchars(strip_tags($request->loan_id));
    $data['email']          = htmlspecialchars(strip_tags($request->email));
    $data['finance_amount'] = htmlspecialchars(strip_tags($request->finance_amount));
    $data['period']         = htmlspecialchars(strip_tags($request->period));
    $data['fullname']       = htmlspecialchars(strip_tags($request->fullname));
    $data['nric']           = htmlspecialchars(strip_tags($request->nric));
    $data['birthdate']      = htmlspecialchars(strip_tags($request->birthdate));
    $data['dependants']     = htmlspecialchars(strip_tags($request->dependants));
    $data['employment']     = htmlspecialchars(strip_tags($request->employment));
    $data['phone']          = htmlspecialchars(strip_tags($request->phone));
    $data['utilities_slip'] = htmlspecialchars(strip_tags($request->utilities_slip));
    $data['salary_slip']    = htmlspecialchars(strip_tags($request->salary_slip));
    $data['id_back']        = htmlspecialchars(strip_tags($request->id_back));
    $data['status']         = 'undisbursed';
    $data['id_front']       = htmlspecialchars(strip_tags($request->id_front));
    Borrower::create($data);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Borrower  $borrower
   * @return \Illuminate\Http\Response
   */
  public function show(Borrower $borrower)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Borrower  $borrower
   * @return \Illuminate\Http\Response
   */
  public function edit(Borrower $borrower)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Borrower  $borrower
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Borrower $borrower)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Borrower  $borrower
   * @return \Illuminate\Http\Response
   */
  public function destroy(Borrower $borrower)
  {
    //
  }

  // public function sendConfirmationEmail($id)
  // {
  //   $userBorrower = Borrower::findOrFail($id);
  //   // $receiver = $userBorrower->email;
  //   $receiver = 'officialcakadi@gmail.com';
  //   $mailData = [
  //     'fullName' => $userBorrower->fullname,
  //     'loanAmount' => '3000',
  //     'timeEstimation' => '48'
  //   ];

  //   dispatch(function () use ($mailData, $receiver, $userBorrower) {
  //     $userBorrower->notify(new BorrowerConfirmationNotification($mailData, $receiver));
  //   });
  // }

  // public function followUpEmail($id)
  // {
  //   $userBorrower = Borrower::findOrFail($id);
  //   $receiver = $userBorrower->email;
  //   $phoneNumber = '088899228123';
  //   $mailData = [
  //     'fullName'    => $userBorrower->fullname,
  //     'url'         => url('/'),
  //     'phoneNumber' => $phoneNumber,
  //   ];

  //   dispatch(function () use ($mailData, $receiver, $userBorrower) {
  //     $userBorrower->notify(new FollowUpEmailNotification($mailData, $receiver));
  //   });
  // }

  public function getDataModalDisbursement($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_disbursement', compact('userBorrower'));
  }

  private function checkForDueDate($date)
  {
    // Parsing date class into day, month, and year
    $date   = $date->addMonths(1);
    $day    = (int)$date->day;
    $month  = (int)$date->month;
    $year   = (int)$date->year;

    // Checking maximum day at particular month & year
    if ($month <= 7) {
      if ($month % 2 != 0) {
        $due_day = 31;
      } else {
        if ($month == 2) {
          if ($year % 4 != 0 && $year % 400 != 0) {
            $due_day = 29;
          } else {
            $due_day = 28;
          }
        } else {
          $due_day = 30;
        }
      }
    } else {
      if ($month % 2 != 0) {
        $due_day = 30;
      } else {
        if ($month == 2) {
          if ($year % 4 != 0 && $year % 400 != 0) {
            $due_day = 29;
          } else {
            $due_day = 28;
          }
        } else {
          $due_day = 31;
        }
      }
    }

    $day = ($day > $due_day) ? $due_day : $day;
    return $year . '-' . $month . '-' . $day;
  }

  public function loanDisbursementConfirm($id)
  {
    $current_date     = Carbon::now();
    $due_calculation  = Carbon::now();
    $due_date         = $this->checkForDueDate($due_calculation);

    $userBorrower               = Borrower::findOrFail($id);
    $userBorrower->status       = 'disbursed';
    $userBorrower->disbursed_at = $current_date;
    $userBorrower->due_date     = $due_date;
    $userBorrower->save();

    $payment_seq                = PaymentSequence::findOrFail($userBorrower->payment_seq()->get()->first()->id);
    $payment_seq->due_date = $due_date;
    $payment_seq->save();

    $sessionMsg = 'Current Condition Successfully Stored';
    return redirect('/dashboard/borrower')->with('message', $sessionMsg);
  }

  public function getDataModalDetail($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_detail', compact('userBorrower'));
  }

  public function getDataModalMonthlyEmail($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_monthly_email', compact('userBorrower'));
  }

  public function sendMonthlyEmail($id, Request $request)
  {
    $request->validate([
      'subjectEmail'    => 'required',
      'loanPeriod'      => 'required',
      'attachmentFile'  => 'required |file|max:2048|mimes:jpg,png,jpeg,pdf',
    ]);

    $userBorrower = Borrower::findOrFail($id);
    $receiver = 'rakha.rozaqtama@gmail.com'; // Code for mail testing
    // $receiver = $userBorrower->email; Code for mail production
    $mailData = [
      'fullname'      => $userBorrower->fullname,
      'period'        => $userBorrower->period,
      'attachment'    => $request->attachmentFile,
      'subjectEmail'  => $request->subjectEmail,
    ];

    dispatch(function () use ($mailData, $receiver, $userBorrower) {
      $userBorrower->notify(new MonthlyStatementNotification($mailData, $receiver));
    });

    $sessionMsg = 'Email Monthly Statement has been Sent';

    return redirect('/dashboard/borrower')->with('message', $sessionMsg);
  }

  public function getDataModalBlacklistBorrower($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_blacklist_borrower', compact('userBorrower'));
  }

  public function blacklistBorrower($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    $receiver = $userBorrower->email;
    $mailData = [
      'fullname'              => $userBorrower->fullname,
      'loanReferenceNumber'   => $userBorrower->loan_id,
      'loanAmmount'           => $userBorrower->loan_amount,
      'phoneNumber'           => $userBorrower->phone,
    ];
    $userBorrower->status = 'blacklist';
    $userBorrower->save();

    dispatch(function () use ($mailData, $receiver, $userBorrower) {
      $userBorrower->notify(new BlackListNotification($mailData, $receiver));
    });

    $sessionMsg = 'Email Blacklist has been Sent';
    return redirect('/dashboard/borrower')->with('message', $sessionMsg);
  }

  public function getDataModalPaymentCompleted($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_payment_completed', compact('userBorrower'));
  }

  public function paymentCompletedConfirmation($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    $userBorrower->status = 'Completed';
    $userBorrower->save();

    $sessionMsg = 'Current Condition Successfully Stored';

    return redirect('/dashboard/borrower')->with('message', $sessionMsg);
  }

  public function getDataModalMonthlyPayment($id)
  {
    $userBorrower = Borrower::findOrFail($id);
    return view('borrower._modal_monthly_payment', compact('userBorrower'));
  }

  public function monthlyPaymentSuccess($id, Request $request)
  {
    $request->validate([
      'sequenceNumber' => 'required',
      'paymentAmount' => 'required',
      'transferReceipt' => 'required|file|max:2048|mimes:png,jpg,pdf,jpeg',
      'paymentMethod' => 'required',
      'remark' => 'required',
    ]);

    $borrower = Borrower::findOrFail($id);
    $direktori = $request->transferReceipt;
    $filename = $borrower->fullname . '-TransferReceipt-' . 'Payment Sequence ' . $request->sequenceNumber . '-' . $direktori->extension();
    $direktori->move(public_path('upload/'), $filename);

    $birthday = Birthday::findOrFail($id);
    $birthday->nama = $request->nama;
    $birthday->ttl = $request->ttl;
    $birthday->foto = $filename;
    $birthday->jenis_kelamin = $request->jenis_kelamin;
    $birthday->save();
  }
}
