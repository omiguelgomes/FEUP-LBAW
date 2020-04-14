<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Table name
    protected $table = 'product';
    
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brandid');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'productid');
    }

    public function imageProduct()
    {
        return $this->hasMany('App\ImageProduct', 'productid');
    }
}