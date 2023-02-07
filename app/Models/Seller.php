<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Seller extends Model
{
    protected $primaryKey = 'seller_id';
    protected $table = "sellers";
    protected $fillable = ['seller_first_name','seller_last_name','seller_email','seller_contact_no','seller_password','seller_repeat_password','seller_upload_image','seller_shop_name','seller_address','seller_logo_img','seller_banner_img'];

    public function getSellerUploadImageAttribute($value){
        return url('/').Storage::url($value);
    }
    public function getSellerLogoImgAttribute($value){
        return url('/').Storage::url($value);
    }
    public function getSellerBannerImgAttribute($value){
        return url('/').Storage::url($value);
    }
    use HasFactory;

}
