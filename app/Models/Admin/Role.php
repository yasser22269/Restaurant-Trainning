<?php

namespace App\Models\Admin;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'roles';

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        ];


    public function employees(){
        return $this->belongsToMany(Employee::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
