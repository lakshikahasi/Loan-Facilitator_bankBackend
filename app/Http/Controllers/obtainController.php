<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obtainloans;

class obtainController extends Controller
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
    public function obtainLoan(Request $request){
        $this->validate($request, [
            'application_id' => 'required',
            'loan_id' => 'required',
            'Issued_date' => 'required',
            'expired_date' => 'required',
            'amount' => 'required',
            'installment' => 'required',
            'no_of_installment' => 'required',
           
        ]);

        $loan = obtainloans::create($request->all());

        return response()->json($loan, 201);
}


}

