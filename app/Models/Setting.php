<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use LogTrait;

    protected $table = 'settings';
    protected $guarded = [];

    public $timestamps = false;
    public function getLogoAttribute($val)
    {
        return $val ? asset('images/setting/'.$val) : '';
    }
    public function getSmallLogoAttribute($val)
    {
        return $val ? asset('images/setting/'.$val) : '';
    }

}
