<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use LogTrait;

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'status', 'icon');

    public function products()
    {
        return $this->hasMany(Product::class, 'cartegory_id');
    }
    public function scopeCategoriesAvailable($query){
        return $query->where('status',1) ; //محجوز
    }
    public function getIconAttribute($val)
    {
        return $val ? asset('images/categories/'.$val) : '';
    }
}
