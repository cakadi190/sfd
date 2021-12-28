<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\PaymentSequence;
use Illuminate\Http\Request;
use App\Notifications\BorrowerConfirmationNotification;
use App\Notifications\FollowUpEmailNotification;
use App\Notifications\BlackListNotification;
use App\Notifications\MonthlyStatementNotification;
use App\Notifications\LoanDisbursementNotification;
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


    /* ===== Helper Function ===== */
    public function checkForOverdue($date){
        $day_due_date = $date->day;
        $month_due_date = $date->month;
        $year_due_date = $date->year;

        $current_date = Carbon::now();
        $current_day = $current_date->day;
        $current_month = $current_date->month;
        $current_year = $current_date->year;

        if($current_year > $year_due_date){
            return 1;
        }
        if($current_year == $year_due_date){
            if($current_month > $month_due_date){
                return 1;
            }else if ($current_month == $month_due_date){
                if($current_day > $day_due_date){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
    }

    private function checkForDueDate($date){
        // Parsing date class into day, month, and year
        $date = $date->addMonths(1);
        $day = (int)$date->day;
        $month = (int)$date->month;
        $year = (int)$date->year;

        // Checking maximum day at particular month & year
        if($month <= 7){
            if($month % 2 != 0){
                $due_day = 31;
            }else{
                if($month == 2){
                    if($year % 4 != 0 && $year % 400 != 0){
                        $due_day = 29;
                    }else{
                        $due_day = 28;
                    }
                }else{
                    $due_day = 30;
                }
            }
        }else{
            if($month % 2 != 0){
                $due_day = 30;
            }else{
                if($month == 2){
                    if($year % 4 != 0 && $year % 400 != 0){
                        $due_day = 29;
                    }else{
                        $due_day = 28;
                    }
                }else{
                    $due_day = 31;
                }
            }
        }

        $day = ($day > $due_day) ? $due_day : $day;
        return $year.'-'.$month.'-'.$day;
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
        foreach($borrowers as $borrower){
            $item = [];

            /*
                Due Date Calculation
             */
            $current_payment_seq = $borrower->payment_seq()->get()->last()->current_payment_seq;
            if($borrower->due_date){
                $due_date = Carbon::createFromDate($borrower->due_date);
                $day_due_date = (int)Carbon::createFromDate($borrower->due_date)->day;
                $month_due_date = (int)Carbon::createFromDate($borrower->due_date)->month;
                $year_due_date = (int)Carbon::createFromDate($borrower->due_date)->year;
                if (($current_year == $year_due_date) && ($current_month <= $month_due_date) && ($current_day < $day_due_date)) {
                    $count_due_date = $current_date->diffInDays($due_date);
                    if ($count_due_date <= 14) {
                        $item['is_payment_due'] = true;
                        $item['note'] = $count_due_date.' days before due date on payment sequence '.$current_payment_seq;
                    } else {
                        $item['is_payment_due'] = false;
                        $item['note'] = $count_due_date.' days before due date on payment sequence '.$current_payment_seq;
                    }
                 } else if (($current_year == $year_due_date) && ($current_month >= $month_due_date) && ($current_day > $day_due_date)) {
                    $count_due_date = $current_date->diffInDays($due_date);
                    $item['is_payment_due'] = true;
                    $item['note'] = 'Sequence Payment '.$current_payment_seq.' late '.$count_due_date.' days';
                 } else {
                    $item['is_payment_due'] = false;
                    $item['note'] = 'Waiting for Sequence Payment '.$current_payment_seq;
                }
            }else {
                $item['is_payment_due'] = false;
                $item['note'] = 'Borrower doesn\'t receive loan yet';
            }

            $item['id'] = $borrower->id;
            $item['loan_id'] = $borrower->loan_id;
            $item['finance_ammount'] = $borrower->finance_amount;
            $item['created_at'] = $borrower->created_at->toFormattedDateString();
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
            'email' => 'required|email',
            'loan_id' => 'required',
            'finance_amount' => 'required',
            'period' => 'required',
            'fullname' => 'required',
            'nric' => 'required',
            'birthdate' => 'required',
            'dependants' => 'required',
            'employment' => 'required',
            'phone' => 'required',
            "utilities_slip"  => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
            "salary_slip"     => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
            "id_back"         => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
            "id_front"        => "required|file|max:2048|mimes:jpg,png,jpeg,pdf",
        ]);

        $data['loan_id'] = htmlspecialchars(strip_tags($request->loan_id));
        $data['email'] = htmlspecialchars(strip_tags($request->email));
        $data['finance_amount'] = htmlspecialchars(strip_tags($request->finance_amount));
        $data['period'] = htmlspecialchars(strip_tags($request->period));
        $data['fullname'] = htmlspecialchars(strip_tags($request->fullname));
        $data['nric'] = htmlspecialchars(strip_tags($request->nric));
        $data['birthdate'] = htmlspecialchars(strip_tags($request->birthdate));
        $data['dependants'] = htmlspecialchars(strip_tags($request->dependants));
        $data['employment'] = htmlspecialchars(strip_tags($request->employment));
        $data['phone'] = htmlspecialchars(strip_tags($request->phone));
        $data['utilities_slip'] = htmlspecialchars(strip_tags($request->utilities_slip));
        $data['salary_slip'] = htmlspecialchars(strip_tags($request->salary_slip));
        $data['id_back'] = htmlspecialchars(strip_tags($request->id_back));
        $data['id_front'] = htmlspecialchars(strip_tags($request->id_front));

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


    /* ====== Disbursement Feature ====== */
    public function getDataModalDisbursement($id){
        $userBorrower = Borrower::findOrFail($id);
        return view('borrower._modal_disbursement', compact('userBorrower'));
    }

    public function loanDisbursementConfirm($id){
        $current_date = Carbon::now();
        $due_calculation = Carbon::now();
        $due_date = $this->checkForDueDate($due_calculation);

        $userBorrower = Borrower::findOrFail($id);
        $userBorrower->status = 'disbursed';
        $userBorrower->disbursed_at = $current_date;
        $userBorrower->due_date = $due_date;
        // $receiver = $userBorrower->email;
        $receiver = 'rakha.rozaqtama@gmail.com';
        $mailData = [
          'fullName' => $userBorrower->fullname,
          'ammount' => $userBorrower->finance_amount,
        ];
        $userBorrower->notify(new LoanDisbursementNotification($mailData, $receiver));
        $userBorrower->save();
        $payment_seq = PaymentSequence::findOrFail($userBorrower->payment_seq()->get()->first()->id);
        $payment_seq->due_date = $due_date;
        $payment_seq->save();

        $sessionMsg = 'Current Condition Successfully Stored';
        return redirect('/dashboard/borrower')->with('message', $sessionMsg);
    }


    /* ===== Detail Borrower Feature ===== */
    public function getDataModalDetail($id){
        $userBorrower = Borrower::findOrFail($id);
        $data = array();
        $item = array();
        $item['borrower'] = $userBorrower;
        $item['salary_slip'] = explode(",", $userBorrower->salary_slip);
        $data[] = $item;
        return view('borrower._modal_detail', ['userBorrower' => $data]);
    }


    /* ===== Monthly Email Feature ===== */
    public function getDataModalMonthlyEmail($id){
        $borrower = Borrower::findOrFail($id);
        return view('borrower._modal_monthly_email', compact('borrower'));
    }

    public function sendMonthlyEmail($id){
        $borrower = Borrower::findOrFail($id);
        $receiver = 'rakha.rozaqtama@gmail.com'; // Code for mail testing
        // $receiver = $userBorrower->email; Code for mail production

        $direktori = request()->attachmentFile;
        $filename = $borrower->fullname.'-AttachmentReminder'.'-Payment Sequence_'.request()->sequenceNumber.'-'.time().'.'.$direktori->extension();
        $direktori->move(public_path('upload/'), $filename);

        $mailData = [
            'fullName' => $borrower->fullname,
            'period' => request()->paymentSeq,
            'attachment' => public_path('upload/'.$filename),
            'subjectEmail' => request()->subjectEmail,
        ];

        $borrower->notify(new MonthlyStatementNotification($mailData, $receiver));

        $sessionMsg = 'Email Monthly Statement has been Sent';

        return redirect('/dashboard/borrower')->with('message', $sessionMsg);
    }


    /* ===== Blacklist Borrower Feature ==== */
    public function getDataModalBlacklistBorrower($id){
        $userBorrower = Borrower::findOrFail($id);
        return view('borrower._modal_blacklist_borrower', compact('userBorrower'));
    }

    public function blacklistBorrower($id){
        $userBorrower = Borrower::findOrFail($id);
        $receiver = 'rakha.rozaqtama@gmail.com';
        // $receiver = $userBorrower->email;
        $mailData = [
            'fullName' => $userBorrower->fullname,
            'loanReferenceNumber' => $userBorrower->loan_id,
            'loanAmmount' => $userBorrower->loan_amount,
            'phoneNumber' => $userBorrower->phone,
        ];
        $userBorrower->status = 'blacklist';
        $userBorrower->save();
        
        $userBorrower->notify(new BlackListNotification($mailData));

        $sessionMsg = 'Email Blacklist has been Sent';
        return redirect('/dashboard/borrower')->with('message', $sessionMsg);
    }


    /* ==== Payment Completed Feature ===== */
    public function getDataModalPaymentCompleted($id){
        $userBorrower = Borrower::findOrFail($id);
        return view('borrower._modal_payment_completed', compact('userBorrower'));
    }

    public function paymentCompletedConfirmation($id){
        $userBorrower = Borrower::findOrFail($id);
        $userBorrower->status = 'Completed';
        $userBorrower->save();

        $sessionMsg = 'Current Condition Successfully Stored';

        return redirect('/dashboard/borrower')->with('message', $sessionMsg);
    }


    /* ==== Monthly Payment Feature ==== */
    public function getDataModalMonthlyPayment($id){
        $userBorrower = Borrower::findOrFail($id);
        $data = [
            'borrower' => $userBorrower,
            'payment_seq' => $userBorrower->payment_seq()->get()->last(),
        ];
        return view('borrower._modal_monthly_payment', ['data' => $data]);
    }

    public function monthlyPaymentSuccess($id){
        $borrower = Borrower::findOrFail($id);
        $payment_seq = $borrower->payment_seq()->get()->last();

        $direktori = Request()->transferReceipt;
        $filename = $borrower->fullname.'-TransferReceipt'.'-Payment Sequence_'.Request()->sequenceNumber.'-'.time().'.'.$direktori->extension();
        $direktori->move(public_path('upload/'), $filename);

        $is_overdue = $this->checkForOverdue($payment_seq->due_date);
        $payment_seq->paid_at = Carbon::now();
        $payment_seq->payment_method = Request()->paymentMethod;
        $payment_seq->status = ($is_overdue) ? "overdue" : "paid";
        $payment_seq->remark = Request()->remark;
        $payment_seq->file_receipt = $filename;
        $payment_seq->save();

        $due_date = $this->checkForDueDate($payment_seq->due_date);
        if($payment_seq->current_payment_seq == $payment_seq->max_payment_seq){
          $borrower->status = 'completed';
        }
        $borrower->due_date = $due_date;
        $borrower->save();
        
        if(($payment_seq->current_payment_seq + 1) <= $payment_seq->max_payment_seq){
            $data_new_payment_seq = [
                'borrower_loan_id' => $borrower->loan_id,
                'current_payment_seq' => ($payment_seq->current_payment_seq + 1),
                'max_payment_seq' => $payment_seq->max_payment_seq,
                'ammount' => round((($borrower->finance_amount) + ($borrower->finance_amount * 0.18)) / $payment_seq->max_payment_seq, 2),
                'due_date' => $due_date,
                'status' => "pending",
            ];
            $new_payment_seq = PaymentSequence::create($data_new_payment_seq);
        }

        if($new_payment_seq){
            $msg = 'Current Condition Successfuly Saved';
        }else {
            $msg = 'Failed to save current condition. Check your connectivity and try again!';
        }
        return redirect('/dashboard/borrower')->with('message', $msg);
    }
}
