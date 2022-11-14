<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model 
{

    protected $table = 'deliveries';
    public $timestamps = true;
    protected $fillable = array('type', 'name', 'phone', 'nid');

}