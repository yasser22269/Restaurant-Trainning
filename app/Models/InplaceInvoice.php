<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InplaceInvoice extends Model 
{

    protected $table = 'inplace_orders';
    public $timestamps = true;
    protected $fillable = array('table_id', 'order_id');

}