<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approveloans extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'approve_id';
    protected $fillable = [
        'approve_id', 'application_id', 'loan_id','approved_date','date_you_come','approve_status','special_notices'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}