<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{

    use Notifiable;

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = array('name', 'role_id', 'nid','email', 'phone', 'password', 'photo', 'status');

//    public function emp_type()
//    {
//        return $this->belongsTo('App\Models\Employee', 'emp_type');
//    }

}
