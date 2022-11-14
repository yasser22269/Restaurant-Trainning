<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model 
{

    protected $table = 'tables';
    public $timestamps = true;
    protected $fillable = array('name', 'status', 'number_of_chairs');

}