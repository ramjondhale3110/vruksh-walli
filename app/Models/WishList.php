<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $primaryKey = 'wish_list_id';
    use HasFactory;
    protected $table = "wish_lists";
    protected $fillable = ['user_id',
    'product_id',
    'is_wishlist',
    'is_active'];

    public function product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'product_id');
    }
}
