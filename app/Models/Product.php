<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'picture', 'price', 'status', 'discount');

    public function options()
    {
        return $this->hasMany('App\Models\Option', 'product_id');
    }

}