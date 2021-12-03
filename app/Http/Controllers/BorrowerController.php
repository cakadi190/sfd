<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Notifications\BorrowerConfirmationNotification;
use App\Notifications\FollowUpEmailNotification;
use App\Notifications\EMandateEmailNotification;

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
        return view('borrower.index');
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
        //
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

    public function sendConfirmationEmail($id){
        $userBorrower = Borrower::findOrFail($id);
        $receiver = $userBorrower->email;
        $mailData = [
            'fullName' => $userBorrower->fullname,
            'loanAmount' => '3000',
            'timeEstimation' => '48'
        ];

        dispatch(function() use ($mailData, $receiver, $userBorrower){
            $userBorrower->notify(new BorrowerConfirmationNotification($mailData, $receiver));
        });
    }

    public function followUpEmail($id){
        $userBorrower = Borrower::findOrFail($id);
        $receiver = $userBorrower->email;
        $phoneNumber = '088899228123';
        $mailData = [
            'fullName' => $userBorrower->fullname,
            'url' => $linkUrl,
            'phoneNumber' => $phoneNumber,
        ];

        dispatch(function() use ($mailData, $receiver, $userBorrower){
            $userBorrower->notify(new FollowUpEmailNotification($mailData, $receiver));
        });
    }

    public function activatingEMandate($id){
        $userBorrower = Borrower::findOrFail($id);
        $receiver = 'rakha.rozaqtama@gmail.com';
        $urlAuthorized = 'https://www.quora.com/';
        $urlRegister = 'https://www.quora.com/';
        $phoneNumber = '09988188272';
        // $receiver = $userBorrower->email;
        $mailData = [
            'fullName' => $userBorrower->fullname,
            'loanAmount' => '5000',
            'urlAuthorized' => $urlAuthorized,
            'urlRegister' => $urlRegister,
            'phoneNumber' => $phoneNumber,
        ];

        dispatch(function() use ($mailData, $receiver, $userBorrower){
            $userBorrower->notify(new EMandateEmailNotification($mailData, $receiver));
        });        
    }
}
