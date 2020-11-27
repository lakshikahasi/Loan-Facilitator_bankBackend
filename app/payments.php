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
        'obtain_id', 'payment_id', 'loan_id', 'Installment_date', 'Installment', 'paid_amount', 'to_be_paid_amount', 'to_be_paid_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
