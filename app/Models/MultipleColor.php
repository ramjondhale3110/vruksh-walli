<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleColor extends Model
{
    protected $primaryKey = 'multiple_color_id';
    use HasFactory;
     protected $table = "multiple_colors";
     protected $fillable = ['color_name','product_id'];
}
