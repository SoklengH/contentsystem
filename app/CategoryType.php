<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;



class CategoryType extends Eloquent
{

	protected $fillable = ['type'];

	

    public function categories()
    {
    	return $this->hasMany('App\Category', 'category_type_id');
    }
}

