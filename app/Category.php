<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\CategoryType;	

class Category extends Model
{

	protected $fillable = ['name', 'featured','category_type_id'];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function posts()
    {
    	return $this->hasMany('App\Post', 'category_id');
    }

    public function categorytype()
    {
        return $this->belongsTo('App\CategoryType', 'category_type_id');
    }
    
}
