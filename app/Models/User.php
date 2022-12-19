<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;


class User extends Model
{
    use LogTrait;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'address');

}
