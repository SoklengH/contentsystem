<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	

class Post extends Model
{

	use SoftDeletes;

	//database will know that, these are assignable 		
	protected $fillable = ['title', 'content', 'featured', 'category_id', 'slug', 'price'];
    
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }   

}
