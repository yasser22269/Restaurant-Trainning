<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use LogTrait;

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
