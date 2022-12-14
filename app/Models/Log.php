<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    public $timestamps = true;
    protected $fillable = array('user_id', 'title');

    public function emp(){
        return $this->belongsTo(Employee::class , 'user_id');
    }
}
