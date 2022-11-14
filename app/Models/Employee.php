<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = array('name', 'role_id', 'nid', 'phone', 'photo', 'status');

    public function emp_type()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_type');
    }

}