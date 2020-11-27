<?php

namespace App\Http\Controllers;

use App\obtainloans;

class PaymentController extends Controller
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

    public function getFarmerLoans($nic, $bank_id){
        $details = obtainloans::join('applications', 'applications.id', '=', 'obtainloans.application_id')->join('loans', 'loans.loan_id', '=', 'obtainloans.loan_id')
        ->where('applications.nic', '=', $nic)
        ->where('loans.bank_id', '=', $bank_id)
        //->select('*')
        ->get();

        /* $loans = obtainloans::join('loans', 'obtainloans.loan_id', '=', 'loans.loan_id')
        ->where('obtainloans.nic', '=', $nic)
        ->where('loans.bank_id', '=', $bank_id)
        ->get(); */

        if($details){
            $res['status']=true;
            $res['message']=$details;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Cannot find applicants!';
            return response($res);
        }
    }
}
