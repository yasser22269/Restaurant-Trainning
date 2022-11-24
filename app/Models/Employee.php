<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = array('name', 'nid', 'phone', 'photo', 'status');

    public function emp_type()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_type');
    }

}
