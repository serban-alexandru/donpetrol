<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public function products(){
        return $this->hasMany('App\Product', 'category_id');
    }

    public function subcategories(){
        return $this->hasMany('App\Category', 'category_id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

}
