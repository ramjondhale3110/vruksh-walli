<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';
    use HasFactory;
    protected $table = "carts";
    protected $fillable = [
    'product_id',
    'quantity',
    'is_active',
    'is_cart'];

    public function cart_product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'product_id');
    }
}
