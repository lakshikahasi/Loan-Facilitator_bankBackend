<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loans;

class LoanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    
    //to add new loans
    public function createLoan(Request $request){
        $this->validate($request, [
            'loan_id' => 'required',
            'loan_name' => 'required',
            'genera_info' => 'required',
            'eligible_borrowers' => 'required',
            'eligible_crops' => 'required',
            'maximum_loanamount' => 'required',
            'Rateofinterest' => 'required',
            'Repaymentperiod' => 'required'
        ]);

        $loan = loans::create($request->all());

        return response()->json($loan, 201);
    }


    //to update existing loan details
    public function updateLoan($loan_id, Request $request){
        $loan = loans::where('loan_id', $loan_id)->first();
        //$loan->update($request->all());

        //$loan = loans::findOrFail($loan_id);
        //$loan->update($request->all());
        return $loan;
        //return response()->json($loan, 200);
    }


    //to obtain existing loan types
    public function getLoans($bank_id, Request $request){
        $loans = loans::where('bank_id', $bank_id)->get();
        return $loans;
    }



    public function getLoanDetails($loan_id, Request $request){
        $loanDetails = loans::where('loan_id', $loan_id)->first();
        return $loanDetails;
    }

}