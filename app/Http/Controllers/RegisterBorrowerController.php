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
      "finance_ammount" => ["required"],
      "period"          => ["required"],
      "purpose"         => ["required"],
      "fullname"        => ["required"],
      "nric"            => ["required"],
      "email"           => ["required", "email"],
      "phone_prefix"    => ["required"],
      "phone"           => ["required"],
      "date"            => ["required"],
      "tax"             => ["required"],
      "employment"      => ["required"],
      "dependants"      => ["required"],
      "id_front"        => ["required", 'file', 'max:2048', 'mimes:jpg,png,jpeg,pdf'],
      "id_back"         => ["required", 'file', 'max:2048', 'mimes:jpg,png,jpeg,pdf'],
      "salary_slip"     => ["required", 'file', 'max:2048', 'mimes:jpg,png,jpeg,pdf'],
      "utilities_slip"  => ["required", 'file', 'max:2048', 'mimes:jpg,png,jpeg,pdf'],
    ]);

    $data['loan_id']          = uniqid('loan-');
    $data['finance_ammount']  = htmlspecialchars(strip_tags($request->loan));
    $data['period']           = htmlspecialchars(strip_tags($request->period));
    $data['fullname']         = htmlspecialchars(strip_tags($request->fullname));
    $data['nric']             = htmlspecialchars(strip_tags($request->nric));
    $data['birthdate']        = htmlspecialchars(strip_tags($request->date));
    $data['dependants']       = htmlspecialchars(strip_tags($request->dependants));
    $data['employment']       = htmlspecialchars(strip_tags($request->employment));

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
}
