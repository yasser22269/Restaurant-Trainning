<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = array('name', 'permissions');


    public function employee(){
        return $this->belongsToMany(Employee::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
