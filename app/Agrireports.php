<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agrireports extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'app_id','agr_images','type'
    ];
	
		
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}