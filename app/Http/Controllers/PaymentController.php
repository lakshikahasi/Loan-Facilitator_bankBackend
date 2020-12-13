<?php

namespace App\Http\Controllers;

use App\obtainloans;
use App\applications;
use App\Payments;
//use App\banks;
//use App\loans;
use Illuminate\Http\Request;

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

    public function getFarmerLoans2($nic){
        $details = obtainloans::join('applications', 'applications.id', '=', 'obtainloans.application_id')->join('loans', 'loans.loan_id', '=', 'obtainloans.loan_id')
        ->where('applications.nic', '=', $nic)
        //->where('loans.bank_id', '=', $bank_id)
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

    /* public function getFarmerLoans($nic){
        $details = obtainloans::join('applications', 'applications.id', '=', 'obtainloans.application_id')->join('loans', 'loans.loan_id', '=', 'obtainloans.loan_id')
        ->where('applications.nic', '=', $nic)
        ->get();

        if($details){
            $res['status']=true;
            $res['message']=$details;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Cannot find applicants!';
            return response($res);
        }
    } */

    public function getFarmerLoans($nic, Request $request){
        $rules = [
            'nic' => 'required',
         ];
   
          $customMessages = [
             'required' => ':attribute all need'
         ];

          $nic = $request->input('nic');
          $bank_id = $request->input('bank_id');
  
          try {
            $details = obtainloans::join('applications', 'applications.id', '=', 'obtainloans.application_id')//->join('loans', 'loans.loan_id', '=', 'obtainloans.loan_id')//->join('banks','banks.bank_id', '=', 'loans.bank_id')
            ->where('applications.nic', '=', $nic)
           
            ->get();
            
              if ($details) {
                  
                          try {
                              
                                $res['status'] = true;
                                //$res['message'] = 'Valued customer';
                                $res['data'] =  $details;
                                
                                return response($res, 200);
   
   
                          } catch (\Illuminate\Database\QueryException $ex) {
                              $res['status'] = false;
                              $res['message'] = $ex->getMessage();
                              return response($res, 500);
                          }
                    
              } else {
                  $res['success'] = false;
                  $res['message'] = 'Incorrect entry';
                  return response($res, 401);
              }
          } catch (\Illuminate\Database\QueryException $ex) {
              $res['success'] = false;
              $res['message'] = $ex->getMessage();
              return response($res, 500);
          }
    }

    public function getPayments($obtain_id){
        $payments = payments::join('obtainloans', 'obtainloans.obtain_id', '=', 'payments.obtain_id')
        ->where('payments.obtain_id', '=', $obtain_id)
        ->get();

        if($payments){
            $res['status']=true;
            $res['message']=$payments;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='No payments yet';
            return response($res);
        }
    }
}
