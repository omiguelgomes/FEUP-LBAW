<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Specs\WaterProofing;

class Product extends Model
{
    //Table name
    protected $table = 'public.product';
    public $timestamps  = false;

    protected $hidden = ['pivot'];
    
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function cpu()
    {
        return $this->belongsTo('App\Specs\Cpu');
    }
    public function ram()
    {
        return $this->belongsTo('App\Specs\Ram');
    }
    public function waterproofing()
    {
        return $this->belongsTo('App\Specs\WaterProofing');
    }
    public function os()
    {
        return $this->belongsTo('App\Specs\Os');
    }
    public function gpu()
    {
        return $this->belongsTo('App\Specs\Gpu');
    }
    public function screensize()
    {
        return $this->belongsTo('App\Specs\ScreenSize');
    }
    public function weight()
    {
        return $this->belongsTo('App\Specs\Weight');
    }
    public function storage()
    {
        return $this->belongsTo('App\Specs\Storage');
    }
    public function battery()
    {
        return $this->belongsTo('App\Specs\Battery');
    }
    public function screenres()
    {
        return $this->belongsTo('App\Specs\ScreenRes');
    }
    public function camerares()
    {
        return $this->belongsTo('App\Specs\CameraRes');
    }
    public function fingerprinttype()
    {
        return $this->belongsTo('App\Specs\FingerprintType');
    }
    
    public function rating()
    {
        $ratingList = $this->hasMany('App\Rating')->get();
        $score = 0;

        if (count($ratingList) == 0)
        {
            return "No ratings";
        }

        foreach($ratingList as $rating)
        {
            $score += (int)$rating['val'];
        }

        return round($score/count($ratingList), 1);
    }

    public function wishlistUsers()
    {
        return $this->belongsToMany('App\User', 'wishlist');
    }

    public function cartUsers()
    {
        return $this->belongsToMany('App\User', 'cart');
    }

    public function purchases()
    {
        return $this->belongsToMany('App\Purchase', 'product_purchase');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'App\ImageProduct');
    }

}