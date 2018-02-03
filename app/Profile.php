<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    protected $fillable = ['avatar', 'user_id', 'youtube', 'facebook', 'about'];
}
