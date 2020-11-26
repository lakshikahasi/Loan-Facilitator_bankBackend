<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id', 'payment_id', 'installment_date', 'installment', 'paid_amount', 'to_be_paid_amount', 'to_be_paid_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
