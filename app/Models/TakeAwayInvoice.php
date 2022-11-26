<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TakeAwayInvoice extends Model 
{

    protected $table = 'take_away_orders';
    public $timestamps = true;
    protected $fillable = array('order_id', 'user_id');

}