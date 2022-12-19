<?php

namespace App\Models\Admin;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use LogTrait;

    public $table = 'permissions';

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];


    public function roles(){
        return $this->belongsToMany(Role::class);
    }

}
