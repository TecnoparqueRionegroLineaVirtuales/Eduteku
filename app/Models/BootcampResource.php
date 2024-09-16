<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BootcampResource extends Model
{
    use HasFactory;

    protected $table = 'bootcamp_resourse';

    protected $fillable = [
        'bootcamp_id',
        'resourse_id',
    ];

    public function bootcamp()
    {
        return $this->belongsTo(bootcamp::class, 'bootcamp_id');
    }

    public function resource()
    {
        return $this->belongsTo(resourceBootcamp::class, 'resourse_id');
    }
}
