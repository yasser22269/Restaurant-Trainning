<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'address');


    public function roles(){
        return $this->belongsToMany(Role::class);
    }

}
