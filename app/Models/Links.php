<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'challenge_id'];

    public function Challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
