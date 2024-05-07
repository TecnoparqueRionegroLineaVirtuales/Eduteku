<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multimedia extends Model
{
    protected $table = 'multimedia';
    protected $fillable = ['name', 'descripcion', 'url', 'user_id', 'status_id', 'category_id'];
}
