<?php

namespace App\Models;

use App\Models\bootcamps;
use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChallengeQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['content'];


    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function bootcamp()
    {
        return $this->belongsTo(bootcamps::class);
    }
}
