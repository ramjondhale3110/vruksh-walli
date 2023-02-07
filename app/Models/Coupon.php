<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{   protected $primaryKey = 'coupon_id';
    protected $table = "coupons";
    protected $fillable = ['coupon_type','title','code','coupon_discount_type','start_date','expire_date','coupon_discount','limit_same_user','minimum_purchase'];
    use HasFactory;
}
