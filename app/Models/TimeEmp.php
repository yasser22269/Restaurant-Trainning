<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEmp extends Model
{
    protected $table = 'time_emps';
    public $timestamps = true;
    protected $fillable = array('emp_id', 'start_at', 'end_at');
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

}