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

    public function image()
    {
        $images = $this->hasMany('App\ImageProduct', 'productid')->get();
        $paths = [];
        foreach($images as $image)
        {
            array_push($paths, $image->image->path);
        }
        return $paths;
    }
}