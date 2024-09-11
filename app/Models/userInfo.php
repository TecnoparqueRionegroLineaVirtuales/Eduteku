<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';
    protected $fillable = ['user_id', 'phone', 'profile', 'mode', 'commitment', 'bootcamp_id', 'state_id', 'challenge_state_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
