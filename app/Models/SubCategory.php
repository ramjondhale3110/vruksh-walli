<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $primaryKey = 'sub_category_id';
    protected $table = "sub_categories";
     protected $fillable = ['sub_category_name','sub_priority_no'];
    use HasFactory;

    public function category(){
        return $this->hasMany('App\Models\Category', 'category_id', 'category_id');
      /*   return $this->hasMany('App\Models\Category', 'category_id', 'category_id')->select('category_id', 'category_name');*/
    }
}
