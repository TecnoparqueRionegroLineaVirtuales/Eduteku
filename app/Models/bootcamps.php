<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bootcamps extends Model
{
    use HasFactory;

    protected $table = 'bootcamp';

    protected $fillable = [
        'name',
        'description',
        'img_url',
        'file',
        'url_course',
        'id_challenge_filter_category',
        
        
    ];

    public function resources()
    {
        return $this->belongsToMany(resourceBootcamp::class, 'bootcamp_resourse', 'bootcamp_id', 'resourse_id');
    }

    public function sponsors()
    {
        return $this->belongsToMany(sponsor::class, 'bootcamp_sponsor', 'id_bootcamp', 'id_sponsor');
    }

    public function userInfo()
    {
        return $this->hasMany(userInfo::class, 'bootcamp_id', 'id');
    }

}
