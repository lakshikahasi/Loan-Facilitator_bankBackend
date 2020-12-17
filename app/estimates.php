<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estimates extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rep_id','forclean','forland','forseed','forfertilizer','forchemicals','forharvest','forothers','totalamount'
    ];

	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}