<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\approveloans;
use App\farmersdetails;
use App\applications;
use App\obtainloans;

class obtainloanController extends Controller
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
    public function obtainloan(Request $request){
        try{	
            $repo = new obtainloans;
            
            $repo->application_id= $request->input('application_id');
            $repo->loan_id=$request->input('loan_id');
            $repo->issued_date=$request->input('issued_date');
            $repo->amount=$request->input('amount');
            $repo->expired_date=$request->input('expired_date');
            $repo->total_amount=$request->input('total_amount');
            $repo->installment=$request->input('installment');
            $repo->no_of_installment=$request->input('no_of_installment');
            $repo->interest_rate=$request->input('interest_rate');
            
            $repo->save();
         
                $res['status'] = true;
                $res['message'] = 'obtain success!';
            
                return response($res, 200);
                
        }
             catch (\Illuminate\Database\QueryException $ex) {
                $res['status'] = false;
                $res['message'] = $ex->getMessage();
                return response($res, 500);
            }


        }

        public function getobtainDetails($loan_id){
      
            $user = applications::join('obtainloans', 'obtainloans.application_id', '=', 'applications.id')
            ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
            ->where('obtainloans.loan_id', '=',$loan_id)
            ->select('*')
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
        

         public function getobtaineddetailsbyappid($application_id){
            $user = applications::join('obtainloans', 'obtainloans.application_id', '=', 'applications.id')
            ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
           ->where('obtainloans.application_id', '=',$application_id)
           ->select('*')
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
    
}
