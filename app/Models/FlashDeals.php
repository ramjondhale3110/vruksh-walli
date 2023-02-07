<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeals extends Model
{
    protected $primaryKey = 'flash_deals_id';
    protected $table = "flash_deals";
    
    protected $fillable = ['flash_title','flash_start_date','flash_end_date','flash_image'];
    public function getFlashImageLogoAttribute($value){
        return url('/').Storage::url($value);
    }
    use HasFactory;
}
