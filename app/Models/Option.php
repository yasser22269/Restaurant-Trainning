<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    protected $table = 'options';
    public $timestamps = true;
    protected $fillable = array('name', 'product_id', 'price', 'status','attribute_id');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

}
