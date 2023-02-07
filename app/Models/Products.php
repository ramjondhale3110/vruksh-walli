<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'product_id';
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['product_name',
    'product_description',
    'product_code',
    'product_colour',
    'product_attributs',
    'product_unit_price',
    'product_purchase_price',
    'product_tax',
    'product_discount',
    'product_qty',
    'product_order_qty',
    'product_shipping_cost',
    'shipping_cost_mul_qty',
    'meta_img',
    'youtube_link',
    'product_img',
    'thumbnail_img',
    'category_id',
    'sub_category_id',
    'brand_id'
     ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'brand_id');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'sub_category_id');
    }
  
}
