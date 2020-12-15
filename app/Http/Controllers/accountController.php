<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class accountController extends Controller
{
	

	
    public function getaccounts($nic){
      
        $user = accounts::where('nic',$nic)->select('*')->get();
        
        return $user;
    }
	
	

	

}