<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
     protected $primaryKey = 'category_product_id';
     protected $table = "products";
     protected $fillable = [ 
        'category_id',
        'sub_category_id'
    ];
    use HasFactory;

     public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }
   
    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'sub_category_id');
    }
}
