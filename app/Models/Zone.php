<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model 
{

    protected $table = 'zones';
    public $timestamps = true;
    protected $fillable = array('name', 'price');

}