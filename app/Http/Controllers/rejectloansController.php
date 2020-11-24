<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rejectloans;

class rejectloansController extends Controller
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
    public function rejectedloan(Request $request){
        try{	
            $repo = new rejectloans;
            
            $repo->application_id= $request->input('application_id');
            $repo->loan_id=$request->input('loan_id');
            $repo->rejected_reason=$request->input('rejected_reason');
            $repo->rejected_date=$request->input('rejected_date');
            
            $repo->save();
         
                $res['status'] = true;
                $res['message'] = 'reject success!';
            
                return response($res, 200);
                
        }
             catch (\Illuminate\Database\QueryException $ex) {
                $res['status'] = false;
                $res['message'] = $ex->getMessage();
                return response($res, 500);
            }
    }

}
