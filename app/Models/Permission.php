<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'permissions';

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
