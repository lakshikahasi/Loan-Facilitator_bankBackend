<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applications;
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
        $user=applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
        ->where('applications.id', '=', $id)
        ->select('choose', 'nameini','namefull','address','TpNo','dob','farmersdetails.nic','email')
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
        ->where('loan_id', '=', $loan_id)
        ->select('nameini', 'date', 'applications.id')
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