<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];
    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'phone', 'nid', 'password', 'age', 'address', 'salary', 'start_date', 'position', 'office', 'photo', 'status', 'role_id'];




    /**
     * @param string $user
     * @return bool
     */

    public function hasAnyRole(string $user)
    {
        return null !== $this->roles()->where('name', $user)->first();
    }

    /**
     * @param array $user
     * @return bool
     */

    public function hasAnyRoles(array $user)
    {
        return null !== $this->roles()->whereIn('name', $user)->first();
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where(['name'=> 'admin' , 'is_system' => true])->exists();
    }


    public function getPhotoAttribute($val){
        return $val ? asset('images/employee/'.$val) :'';
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

}
