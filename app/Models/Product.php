<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'picture', 'price', 'status', 'discount', 'category_id');

    public function option()
    {
        return $this->hasMany(Option::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getPictureAttribute($val)
    {
        return $val ? asset('images/products/'.$val) : '';
    }



}
