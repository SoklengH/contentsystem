<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
   protected $fillable = ['name', 'featured', 'description'];

   public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
}
