<?php

namespace App\Http\Controllers;

use App\applications;
use App\farmersdetails;
use App\obtainloans;

class ObtainedLoansController extends Controller
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

    public function getObtainedDetails($loan_id){
        
        $user = applications::join('obtainloans', 'obtainloans.application_id', '=', 'applications.id')->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
        ->where('obtainloans.loan_id', '=',$loan_id)
        ->select('applications.nic','application_id','obtained_date', 'farmersdetails.nameini')
        ->get();

        if ($user) {
           $res['status'] = true;
           $res['message'] = $user;
   
           return response($res);
        }
        else{
            $res['status'] = false;
            $res['message'] = 'Cannot find applicant!';
   
            return response($res);
        }
    }

    public function getObtainedFarmerDetails($id){
        $det=applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')->join('obtainloans', 'obtainloans.application_id', '=', 'applications.id')
        ->where('applications.id', '=', $id)
        ->select('*')
        ->first();

        if($det){
            $res['status']=true;
            $res['message']=$det;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='No relavant details';
            return response($res);
        }
    }
}
