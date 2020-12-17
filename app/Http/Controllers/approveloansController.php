<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\approveloans;
use App\farmersdetails;
use App\applications;
use App\rejectloans;

class approveloansController extends Controller
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
    public function approveloan(Request $request){
        try{	
            $repo = new approveloans;
            
            $repo->application_id= $request->input('application_id');
            $repo->loan_id=$request->input('loan_id');
            $repo->approved_date=$request->input('approved_date');
            $repo->date_you_come=$request->input('date_you_come');
            //$repo->branch=$request->input('branch');
            $repo->special_notices=$request->input('special_notices');
            $repo->approve_status=$request->input('approve_status');

           
            
            $repo->save();
         
                $res['status'] = true;
                $res['message'] = 'approve success!';
            
                return response($res, 200);
                
        }
             catch (\Illuminate\Database\QueryException $ex) {
                $res['status'] = false;
                $res['message'] = $ex->getMessage();
                return response($res, 500);
            }
    }

    public function getapproveDetails($loan_id){
      
       $user = applications::join('approveloans', 'approveloans.application_id', '=', 'applications.id')
       ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
       ->where('approveloans.loan_id', '=',$loan_id)
       ->where('approveloans.approve_status', '=',"false")
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

    public function getapproveDetailsbyappid($application_id){
        $user = applications::join('approveloans', 'approveloans.application_id', '=', 'applications.id')
        ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
       ->where('approveloans.application_id', '=',$application_id)
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

    public function rejectloan(Request $request){
        try{	
            $repo = new rejectloans;
            
            $repo->application_id= $request->input('application_id');
            $repo->loan_id=$request->input('loan_id');
            $repo->rejected_date=$request->input('rejected_date');
            //$repo->date_you_come=$request->input('date_you_come');
            //$repo->branch=$request->input('branch');
            $repo->rejected_reason=$request->input('rejected_reason');
            $repo->From_where=$request->input('From_where');
           
            
            $repo->save();
         
                $res['status'] = true;
                $res['message'] = 'Reject success!';
            
                return response($res, 200);
                
        }
             catch (\Illuminate\Database\QueryException $ex) {
                $res['status'] = false;
                $res['message'] = $ex->getMessage();
                return response($res, 500);
            }
    }


    
    public function updateapprove($approve_id,Request $request)
    {
      
        $page = $request->all();
        $plan = approveloans::where('approve_id','=',$approve_id)->first();
        $plan->update($page);
        
        
            $res['status'] = true;
            $res['message'] = 'success!';
            return response($res, 200);
      
    

}

public function getrejectDetails($loan_id){
      
    $user = applications::join('rejectloans', 'rejectloans.application_id', '=', 'applications.id')
    ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
    ->where('rejectloans.loan_id', '=',$loan_id)
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

 public function getrejectDetailsbyappid($application_id){
    $user = applications::join('rejectloans', 'rejectloans.application_id', '=', 'applications.id')
    ->join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
   ->where('rejectloans.application_id', '=',$application_id)
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
