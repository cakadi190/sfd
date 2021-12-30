<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class PayNowController extends Controller
{
  function check(Request $request)
  {
    $id   = htmlspecialchars(strip_tags($request->number));
    $loan = Applicant::where('loan_id', $id);

    if($loan->count() > 0) return view('paynow-check', ['data' => $loan->first()]);

    return redirect()->back()->with('error', 'Sorry, your loan id is not found, recheck your input correctly!');
  }
}
