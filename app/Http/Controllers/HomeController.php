<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Borrower;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

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
  public function index()
  {
    $apply  = new Applicant();
    $borrow = new Borrower();
    $time   = new Carbon();

    # Apply List
    $apply_today                  = $apply->whereDate('created_at', $time->today());
    $apply_week                   = $apply->whereBetween('created_at', [$time->today()->startOfWeek(), $time->today()->endOfWeek()]);
    $apply_month                  = $apply->whereBetween('created_at', [$time->today()->startOfMonth(), $time->today()->endOfMonth()]);
    $apply_year                   = $apply->whereBetween('created_at', [$time->today()->startOfYear(), $time->today()->endOfYear()]);
    $data['counter_apply_day']    = $apply_today->count();
    $data['counter_apply_week']   = $apply_week->count();
    $data['counter_apply_month']  = $apply_month->count();
    $data['counter_apply_year']   = $apply_year->count();
    $data['counter_apply_all']    = $apply->all()->count();

    # Borrower List
    $borrow_today                  = $borrow->whereDate('created_at', $time->today());
    $borrow_week                   = $borrow->whereBetween('created_at', [$time->today()->startOfWeek(), $time->today()->endOfWeek()]);
    $borrow_month                  = $borrow->whereBetween('created_at', [$time->today()->startOfMonth(), $time->today()->endOfMonth()]);
    $borrow_year                   = $borrow->whereBetween('created_at', [$time->today()->startOfYear(), $time->today()->endOfYear()]);
    $data['counter_borrow_day']    = $borrow_today->count();
    $data['counter_borrow_week']   = $borrow_week->count();
    $data['counter_borrow_month']  = $borrow_month->count();
    $data['counter_borrow_year']   = $borrow_year->count();
    $data['counter_borrow_all']    = $borrow->all()->count();

    // dd($data);

    return view('dashboard', $data);
  }
}
