<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agriloans extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rep_id','bank_name','b_amount'
    ];
	
		
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}