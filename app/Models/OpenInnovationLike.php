<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenInnovationLike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];

    /**
     * Get the parent likeable model (bootcamp or challenge)
     */
    public function likeable()
    {
        return $this->morphTo();
    }

}
