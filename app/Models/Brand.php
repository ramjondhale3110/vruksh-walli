<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    protected $primaryKey = 'brand_id';
    use HasFactory;
    protected $table = "brands";

    protected $fillable = ['brand_name','brand_logo'];

   
}
