<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $applicant = new Applicant();
    $data['applies'] = $applicant->all();
    return view('applicant.index', $data);
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
    //
  }
}
