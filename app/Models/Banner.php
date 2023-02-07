<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
class Banner extends Model
{
    protected $primaryKey = 'banner_id';
    use HasFactory;
    protected $table = "banners";
    protected $fillable = ['banner_url','banner_type','resource_type','banner_product','banner_image'];

    public function getBannerImageAttribute($value){
        return url('/').Storage::url($value);
    }
}
