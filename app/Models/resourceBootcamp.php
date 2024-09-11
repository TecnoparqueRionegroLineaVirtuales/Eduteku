<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resourceBootcamp extends Model
{
    use HasFactory;

    protected $table = 'resourse_bootcamp';

    protected $fillable = [
        'url_img',
    ];

    public function bootcamps()
    {
        return $this->belongsToMany(bootcamp::class, 'bootcamp_resourse', 'resourse_id', 'bootcamp_id');
    }
}
