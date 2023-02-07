<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{   
    protected $primaryKey = 'category_id';
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['category_name','priority_no','category_img'];

   
    public function subcategory(){
        return $this->hasMany('App\Models\SubCategory', 'sub_category_id', 'category_id');
    }
}
