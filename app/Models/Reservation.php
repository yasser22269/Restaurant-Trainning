<?php

namespace App\Models;

use App\Traits\LogTrait;
use Carbon\Carbon;
use Cassandra\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use LogTrait;

    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
    public function scopeReservationDay($query){
        return $query->where('scheduleDate',Carbon::now()->format('Y/m/d')) ;
    }
    public function scopeReservation_scheduleDate($query,$date){
        if($date == null)
            return;
        return $query->where('scheduleDate',Carbon::parse($date)->format('Y/m/d')) ;
    }
    public function scopeTable($query,$id){
        return $query->where('table_id',$id) ;
    }
}
