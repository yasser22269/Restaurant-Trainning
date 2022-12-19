<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model;


class Zone extends Model
{
    use LogTrait;

    protected $table = 'zones';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'status');

}
