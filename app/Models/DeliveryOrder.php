<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model 
{

    protected $table = 'delivery_orders';
    public $timestamps = true;
    protected $fillable = array('order_id', 'user_id', 'emp_id');

}