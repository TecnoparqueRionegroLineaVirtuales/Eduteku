<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpseclib3\Crypt\ChaCha20;

class Tags extends Model
{
    use HasFactory;

    //Relación muchos a muchos
    public function challenges() : BelongsToMany
    {
        return $this->belongsToMany(Challenge::class);
    }
}
