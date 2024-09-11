<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'img_url'];

    //Relación muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function links()
    {
        return $this->hasMany(Links::class);
    }

    public function bootcamp()
    {
        return $this->belongsTo(bootcamps::class);
    }
}
