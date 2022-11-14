<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'order';
    public $timestamps = true;
    protected $fillable = array('Invoice_number', 'type', 'taxes', 'discount', 'total_price', 'payment_type', 'emp_id', 'paid_status');

}