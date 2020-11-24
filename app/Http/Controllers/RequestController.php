<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applications;
use App\applicationviews;
use App\farmersdetails;

class RequestController extends Controller
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

    public function getFarmerDetails($id){
   
	   
	   $user = applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
       ->where('applications.id', '=',$id)
       ->select('choose', 'nameini','namefull','farmersdetails.address','TpNo','dob','farmersdetails.nic','email')
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

    public function getApplicationDetails($loan_id){
        $user = applicationviews::join('farmersdetails', 'farmersdetails.nic', '=', 'applicationviews.nic')
        ->where('loan_id', '=', $loan_id)
        ->select('nameini', 'date', 'app_id')
        ->get();

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


    public function getapplicantdetails($app_id)
    {
    //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
      // 'nic','applications.nic')
       //->select('nameini','date')->get();
     
     $user = Applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
      ->where('applications.id', '=',$app_id)
      ->select('*')
      ->get();
  
       if ($user) {
        $res['status'] = true;
        $res['message'] = $user;
  
        return response($res);
        }
    else{
           $res['status'] = false;
           $res['message'] = 'Cannot find applicants!';
  
         return response($res);
        }
  
        
    
  }

  
  public function dltreject($app_id){
   
    $user = applicationviews::where('app_id', '=', $app_id)
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