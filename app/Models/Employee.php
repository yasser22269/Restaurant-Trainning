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

    protected $table = 'employees';

    protected $hidden = [
        'remember_token',
        'password',
    ];
    public $timestamps = true;

    protected $fillable = ['name', 'nid', 'phone', 'photo', 'status' , 'email' ,'email_verified_at'];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
