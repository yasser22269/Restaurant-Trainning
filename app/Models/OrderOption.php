<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderOption extends Model 
{

    protected $table = 'order_options';
    public $timestamps = false;
    protected $fillable = array('order_id', 'option_id');

}