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
            'loan_id' => 'required | unique:loans',
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


    
    public function updateLoan($loan_id, Request $request){
        
        //$loanupd = loans::findOrFail($loan_id);


        $loanupd = loans::where('loan_id', $loan_id)->first();
        $loanupd->update($request->all());
        return response()->json($loanupd, 200);


        /* $res = $request->all();
        $result = loans::where('loan_id', '=', $loan_id)->first();
        $result->update($res);
        return $res; */



        //$loan = loans::findOrFail($loan_id);
        //$loan->update($request->all());
        //return $loan;
        
        /* $loanDetails = loans::where('loan_id', $loan_id)->first();
        return $loanDetails; */
    }


    //to obtain existing loan types
    public function getLoans($bank_id, Request $request){
        $loans = loans::where('bank_id', '=', $bank_id)->get();

        if($loans){
            $res['status']=true;
            $res['message']=$loans;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Cannot find applicants!';
            return response($res);
        }
    }


    //to retrive all loan scheme details
    public function getLoanDetails($loan_id){
        $loanDetails = loans::where('loan_id', '=', $loan_id)->first();
        return $loanDetails;
    }

}
