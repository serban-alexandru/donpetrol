<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function products(){

        return $this->hasMany('App\OrderHasProduct', 'order_id');

    }

}
