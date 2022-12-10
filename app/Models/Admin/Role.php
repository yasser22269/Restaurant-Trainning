<?php

namespace App\Models\Admin;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    public $timestamps = true;
    protected $fillable = ['name'];


    public function employees(){
        return $this->belongsToMany(Employee::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
