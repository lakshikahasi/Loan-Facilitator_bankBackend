<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\banks;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class BankController extends Controller
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

    public function bankDetails($bank_id, Request $request){

        $bank = banks::where('bank_id', $bank_id)->first();
        return $bank;
    }
}
