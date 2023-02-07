<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $primaryKey = 'attribute_id';
    protected $table = "attributes";
    use HasFactory;
    protected $fillable = ['attribute_name'];
}
