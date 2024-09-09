<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'img_url'];

    //Relación muchos a muchos
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
