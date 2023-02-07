<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $primaryKey = 'language_id';
    protected $table = "languages";
    protected $fillable = ['language',
    'country_code',
    'direction'];
    use HasFactory;
}
