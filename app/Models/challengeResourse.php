<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class challengeResourse extends Model
{
    use HasFactory;
    protected $table = 'challenge_resourse';

    protected $fillable = [
        'challenge_id',
        'resourse_id',
    ];

    public function challenge()
    {
        return $this->belongsTo(challenge::class, 'challenge_id');
    }

    public function resource()
    {
        return $this->belongsTo(resourceBootcamp::class, 'resourse_id');
    }
}
