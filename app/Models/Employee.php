<?php

namespace App\Models;

use App\Models\TimeEmp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{

    use Notifiable;

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'phone', 'nid', 'password', 'age', 'address', 'salary', 'start_date', 'position', 'office', 'photo', 'status', 'role_id'];



    public function getPhotoAttribute($val){
        return $val ? asset('images/employee/'.$val) :'';
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
        public function timeEmp()
    {
        return $this->hasOne(TimeEmp::class, 'emp_id');
    }


//    public function emp_type()
//    {
//        return $this->belongsTo('App\Models\Employee', 'emp_type');
//    }

}
