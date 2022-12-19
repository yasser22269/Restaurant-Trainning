<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use LogTrait;
    protected $table = 'tables';
    public $timestamps = true;
    protected $fillable = array('name', 'status', 'number_of_chairs');

    public function scopeStatusAvailable($query){
        return $query->where('status',1) ; //محجوز
    }
    public function Reservations()
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }

//    protected static function booted()
//    {
//        static::created(function ($table) {
//            $user_id  = auth()->id();
//            $user_name  = auth()->user()->name;
//            $tableId = $table->id;
//            Log::create([
//                'title' => "Admin $user_name created a new Raw: $tableId in Table Page",
//                'user_id' => $user_id,
//            ]);
//        });
//        static::updated(function ($table) {
//            $user_id  = auth()->id();
//            $user_name  = auth()->user()->name;
//            $tableId = $table->id;
//            Log::create([
//                'title' => "Admin $user_name updated Raw: $tableId in Table Page",
//                'user_id' => $user_id,
//            ]);
//        });
//        static::deleted(function ($table) {
//            $user_id  = auth()->id();
//            $user_name  = auth()->user()->name;
//            $tableId = $table->id;
//            Log::create([
//                'title' => "Admin $user_name deleted Row: $tableId in Table Page",
//                'user_id' => $user_id,
//            ]);
//        });
//    }
}
