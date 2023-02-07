<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{   protected $primaryKey = 'delivery_men_id';
    protected $table = "delivery_men";
    protected $fillable = ['deliveryman_name','deliveryman_last_name','deliveryman_email','deliveryman_phone','deliveryman_identity_type','deliveryman_identity_no','deliveryman_identity_img','deliveryman_img','delivery_password'];

    use HasFactory;

   
}
