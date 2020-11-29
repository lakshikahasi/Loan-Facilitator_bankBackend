<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\approveloans;
use App\farmersdetails;
use App\applications;

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
            $repo->date=$request->input('date');
            $repo->date_you_come=$request->input('date_you_come');
            //$repo->branch=$request->input('branch');
            $repo->special_notices=$request->input('special_notices');

           
            
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
        $user = approveloans::join('applications', 'applications.id', '=', 'approveloans.application_id')
       ->where('approveloans.loan_id', '=',$loan_id)
       ->select('applications.nic','application_id','approveloans.date','date_you_come','special_notices')
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
        $user = approveloans::join('applications', 'applications.id', '=', 'approveloans.application_id')
       ->where('application_id', '=',$application_id)
       ->select('applications.nic','application_id','approveloans.date','date_you_come','special_notices')
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

    public function dltapprove($app_id){
   
        $user = approveloans::where('application_id', '=', $app_id)
                ->delete();
    
        if($user){
            $res['status']=true;
            $res['message']=$user;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Cannot find applicants!';
            return response($res);
        }
    }

}
