<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'content', 'featured', 'category_id', 'admin'
    ];

    protected $visible = [
        'featured', 'title', 'content', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }


}
