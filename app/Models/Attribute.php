<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    protected $table = 'attributes';
    public $timestamps = true;
    protected $fillable = array('name', 'status');

    public function option()
    {
        return $this->hasMany('App\Models\Option');
    }
    public function scopeAttributesAvailable($query){
        return $query->where('status',1) ; //محجوز
    }

}
