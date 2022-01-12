<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkycController extends Controller
{
  function home() {
    return view('ekyc.testing');
  }
  function process(Request $request) {
    $ic_front = $request->ic_front;
    $ic_back  = $request->ic_back;

    dd($ic_front, $ic_back);
  }
}
