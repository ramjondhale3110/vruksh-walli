<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['product_id',
    'user_id','order_status','payment_method','shipping_cost','verification_code','delivery_man_id','amount'];
}
