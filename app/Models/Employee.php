<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{

    use Notifiable;
    use HasFactory;
    use HasApiTokens;

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'phone', 'nid', 'password', 'age', 'address', 'salary', 'start_date', 'position', 'office', 'photo', 'status'];



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

    /**
     * @param string $user
     * @return bool
     */

    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * @param array $user
     * @return bool
     */

    public function hasAnyRoles(array $roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }


    public function roles()
    {
        return $this->belongsToMany(\App\Models\Admin\Role::class);
    }



}
