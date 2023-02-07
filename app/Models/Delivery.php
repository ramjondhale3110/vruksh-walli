<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Delivery extends Model
{
    protected $primaryKey = 'delivery_id';
    protected $table = "deliveries";
    protected $fillable = ['deliveryman_name','deliveryman_last_name','deliveryman_email','deliveryman_phone','deliveryman_identity_type','deliveryman_identity_no','deliveryman_identity_img','deliveryman_img','delivery_password'];

    use HasFactory;

    public function getDeliverymanIdentityImgAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getDeliverymanImgAttribute($value){
        return url('/').Storage::url($value);
    }
}
