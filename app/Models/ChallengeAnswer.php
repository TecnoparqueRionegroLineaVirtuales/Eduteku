<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeAnswer extends Model
{
    use HasFactory;

    // The actual answer, URL for image or video...
    protected $fillable = ['content'];
}
