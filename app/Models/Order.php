<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use LogTrait;

    protected $table = 'order';
    public $timestamps = true;
    protected $fillable = array('Invoice_number', 'type', 'taxes', 'discount', 'total_price', 'payment_type', 'emp_id', 'paid_status');

}
