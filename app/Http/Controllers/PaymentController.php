<?php

namespace App\Http\Controllers;

use App\obtainloans;
use App\applications;
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
  
          //$this->validate($request, $rules, $customMessages);
  
         /*$user_data = array(
             'username' => $request->get('username'),
             'password' => $request->get('password')
         )*/
  
  
          $nic = $request->input('nic');
  
          try {
            $details = obtainloans::join('applications', 'applications.id', '=', 'obtainloans.application_id')->join('loans', 'loans.loan_id', '=', 'obtainloans.loan_id')
            ->where('applications.nic', '=', $nic)
            ->get();
            //if ($details->applications.nic == $request->input('nic')) {
              if ($details) {
                  //if ($login->count() > 0) {
                      //if ($request->input('nic')== $details->applications.nic) {
                          try {
                              //$api_token = sha1($login->id_user.time());
   
                                //$create_token = banks::where('id', $login->id_user)->update(['api_token' => $api_token]);
                                $res['status'] = true;
                                $res['message'] = 'Valued customer';
                                $res['data'] =  $details;
                                //$res['api_token'] =  $api_token;
   
                                return response($res, 200);
   
   
                          } catch (\Illuminate\Database\QueryException $ex) {
                              $res['status'] = false;
                              $res['message'] = $ex->getMessage();
                              return response($res, 500);
                          }
                      /* } else {
                          $res['success'] = false;
                          $res['message'] = 'Not a loan borrower';
                          return response($res, 401);
                      } */
                  /* } else {
                      $res['success'] = false;
                      $res['message'] = 'Incorrect username';
                      return response($res, 401);
                  } */
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
}
