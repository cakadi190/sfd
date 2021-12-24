<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Borrower;
use App\Models\PaymentSequence;
use Carbon\Carbon;

class HomeController extends Controller
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
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  public function countProfit($data){
    $profit = 0;
    foreach($data as $d){
      $profit += (($d->ammount * 18) / 100);
    }
    return $profit;
  }

  public function index(){
      $apply  = new Applicant();
      $borrow = new Borrower();
      $time   = new Carbon();

      # Data Tiles Chart
      # Today
      $firstPayment = PaymentSequence::all()->first();
      $firstDate = $firstPayment->paid_at;
      $monthOne = $this->countProfit(PaymentSequence::whereBetween("paid_at", [$firstDate, $firstDate->addMonth()])->get());
      $monthTwo = $this->countProfit(PaymentSequence::whereBetween("paid_at", [$firstDate, $firstDate->addMonth()])->get());
      $monthThree = $this->countProfit(PaymentSequence::whereBetween("paid_at", [$firstDate, $firstDate->addMonth()])->get());
      $monthFour = $this->countProfit(PaymentSequence::whereBetween("paid_at", [$firstDate, $firstDate->addMonth()])->get());
      $monthFive = $this->countProfit(PaymentSequence::whereBetween("paid_at", [$firstDate, $firstDate->addMonth()])->get());
      $data_tiles = [$monthOne, $monthTwo, $monthThree, $monthFour, $monthFive];
      dd($monthOne, $monthTwo, $monthThree, $monthFour, $monthFive, $data_tiles);

      # Data Pie Chart
      # Today
      $first_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 01, 00, 00);
      $last_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 24, 00, 00);
      $loan_approved = count(Borrower::whereBetween("created_at", [$first_time, $last_time])->where("status", "disbursed")->get());
      $loan_applied = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "applied")->get());
      $loan_rejected = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "canceled")->get());

      $data_today_pie = [
        'loan_approved' => $loan_approved,
        'loan_applied' => $loan_applied,
        'loan_rejected' => $loan_rejected
      ];

      // # Apply List
      $apply_today                  = $apply->whereDate('created_at', $time->today());
      $apply_week                   = $apply->whereBetween('created_at', [$time->today()->startOfWeek(), $time->today()->endOfWeek()]);
      $apply_month                  = $apply->whereBetween('created_at', [$time->today()->startOfMonth(), $time->today()->endOfMonth()]);
      $apply_year                   = $apply->whereBetween('created_at', [$time->today()->startOfYear(), $time->today()->endOfYear()]);
      $data['counter_apply_day']    = $apply_today->count();
      $data['counter_apply_week']   = $apply_week->count();
      $data['counter_apply_month']  = $apply_month->count();
      $data['counter_apply_year']   = $apply_year->count();
      $data['counter_apply_all']    = $apply->all()->count();

      // # Borrower List
      $borrow_today                  = $borrow->whereDate('created_at', $time->today());
      $borrow_week                   = $borrow->whereBetween('created_at', [$time->today()->startOfWeek(), $time->today()->endOfWeek()]);
      $borrow_month                  = $borrow->whereBetween('created_at', [$time->today()->startOfMonth(), $time->today()->endOfMonth()]);
      $borrow_year                   = $borrow->whereBetween('created_at', [$time->today()->startOfYear(), $time->today()->endOfYear()]);
      $data['counter_borrow_day']    = $borrow_today->count();
      $data['counter_borrow_week']   = $borrow_week->count();
      $data['counter_borrow_month']  = $borrow_month->count();
      $data['counter_borrow_year']   = $borrow_year->count();
      $data['counter_borrow_all']    = $borrow->all()->count();

      $data = [
        'pie' => $data_today_pie,
        'table' => [
          'applicant' => [
            'day' => $data['counter_apply_day'],
            'week' => $data['counter_apply_week'],
            'month' => $data['counter_apply_month'],
            'year' => $data['counter_apply_year'],
            'all' => $data['counter_apply_all']
          ],
          'borrower' => [
            'day' => $data['counter_borrow_day'],
            'week' => $data['counter_borrow_week'],
            'month' => $data['counter_borrow_month'],
            'year' => $data['counter_borrow_year'],
            'all' => $data['counter_borrow_all']
          ],
        ],
        'tiles' => $data_tiles,
      ];
      return view('dashboard', ['data' => json_encode($data)]);
  }

  public function getDataPieToday(){
      # Today
      $first_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 01, 00, 00);
      $last_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 24, 00, 00);
      $loan_approved = count(Borrower::whereBetween("created_at", [$first_time, $last_time])->where("status", "disbursed")->get());
      $loan_applied = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "applied")->get());
      $loan_rejected = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "canceled")->get());

      $data_today_pie = [
        'loan_approved' => $loan_approved,
        'loan_applied' => $loan_applied,
        'loan_rejected' => $loan_rejected
      ];

      return json_encode($data_today_pie);
  }

  public function getDataPieThisMonth(){
      # Data Pie Chart
      $first_time = Carbon::create(Carbon::now()->year, (Carbon::now()->month - 1), 01, 01, 00, 00)->subMonth(1);
      $last_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 24, 00, 00);
      $loan_approved = count(Borrower::whereBetween("created_at", [$first_time, $last_time])->where("status", "disbursed")->get());
      $loan_applied = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "applied")->get());
      $loan_rejected = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "canceled")->get());

      $data_today_pie = [
        'loan_approved' => $loan_approved,
        'loan_applied' => $loan_applied,
        'loan_rejected' => $loan_rejected
      ];

      return json_encode($data_today_pie);
  }

  public function getDataPieLastMonth(){
      # Data Pie Chart
      $first_time = Carbon::create(Carbon::now()->year, (Carbon::now()->month - 1), 01, 01, 00, 00)->subMonth(2);
      $last_time = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day, 24, 00, 00)->subMonth(1);
      $loan_approved = count(Borrower::whereBetween("created_at", [$first_time, $last_time])->where("status", "disbursed")->get());
      $loan_applied = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "applied")->get());
      $loan_rejected = count(Applicant::whereBetween("created_at", [$first_time, $last_time])->where("status", "canceled")->get());

      $data_today_pie = [
        'loan_approved' => $loan_approved,
        'loan_applied' => $loan_applied,
        'loan_rejected' => $loan_rejected
      ];

      return json_encode($data_today_pie);
    }
}
