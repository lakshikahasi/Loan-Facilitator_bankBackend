<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rejectloans extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reject_id', 'application_id', 'loan_id', 'rejected_reason', 'rejected_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}