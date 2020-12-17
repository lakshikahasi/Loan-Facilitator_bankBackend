<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applications;
use App\farmersdetails;
use App\reports;
use App\agriloans; 
use App\estimates; 


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

        //const $farmNIC = 'farmersdetails.nic';
        $user=applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
        ->join('reports','reports.app_id','=','applications.id')
        ->where('applications.id', '=', $id)
        ->select('*')
        ->get();

        if($user){
            $res['status']=true;
            $res['message']=$user;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Cannot find applicant!';
            return response($res);
        }
    }

    public function getApplicationDetails($loan_id){
        $user = applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
        ->join('reports','reports.app_id','=','applications.id')
        ->where('applications.loan_id', '=', $loan_id)
        ->where('reports.AO_status','=',"true")
        ->where('reports.AI_status','=',"true")
        ->where('reports.DO_status','=',"true")
        ->where('reports.bank_status','=',"false")
        ->select('*')
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

    public function getApplicantDetails($app_id){
        $details = applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
        ->join('reports','reports.app_id','=','applications.id')
        ->where('applications.id', '=', $app_id)
        ->select('*')
        ->get();

        if($details){
            $res['status']=true;
            $res['message']=$details;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='NO details to show';
            return response($res);
        }
    }

            
    public function showARloans($app_id){

        $user = reports::join('applications', 'applications.id', '=', 'reports.app_id')
        ->join('agriloans','agriloans.rep_id','=','reports.rep_id')
        ->where('applications.id', '=', $app_id)
        ->select('*')
        ->get();
  
                  if ($user) {
                      $res['status'] = true;
                      $res['message'] = $user;
              
                      return response($res);
                      }
                      else{
                         $res['status'] = false;
                         $res['message'] = 'success';
              
                       return response($res);
                      }
  
  
      
          }


          public function showestimate($app_id){

            $user = reports::join('applications', 'applications.id', '=', 'reports.app_id')
            ->join('estimates','estimates.rep_id','=','reports.rep_id')
            ->where('applications.id', '=', $app_id)
            ->select('*')
            ->get();
      
                      if ($user) {
                          $res['status'] = true;
                          $res['message'] = $user;
                  
                          return response($res);
                          }
                          else{
                             $res['status'] = false;
                             $res['message'] = 'success';
                  
                           return response($res);
                          }
      
      
          
              }

              
              public function updateagri($app_id,Request $request)
              {
                try{
                  $page = $request->all();
                  $plan = reports::join('applications', 'applications.id', '=', 'reports.app_id')
                  ->where('reports.app_id','=',$app_id)->first();
                  $plan->update($page);
                  
                  
                      $res['status'] = true;
                      $res['message'] = 'success!';
                      return response($res, 200);
                
                }
                
                catch (\Illuminate\Database\QueryException $ex) {
                          $res['status'] = false;
                          $res['message'] = $ex->getMessage();
                          return response($res, 500);
                      }
  
              }




}