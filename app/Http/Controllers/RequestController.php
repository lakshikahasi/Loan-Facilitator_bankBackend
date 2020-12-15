<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applications;
use App\farmersdetails;
use App\reports;

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
}