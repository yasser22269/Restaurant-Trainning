<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{

    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = array('name', 'permissions');

    public function role()
    {
        return $this->hasMany('App\Models\Employee', 'role_id');
    }

}