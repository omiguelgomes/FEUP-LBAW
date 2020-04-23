<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Specs\WaterProofing;

class Product extends Model
{
    //Table name
    protected $table = 'product';
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

    public function discounts()
    {
        return $this->belongsToMany('App\Discount', 'discount_product')->where('begindate', '<=', date("Y-m-d"))->
        where('enddate', '>=', date("Y-m-d"));
    }

    public function allDiscounts()
    {
        return $this->belongsToMany('App\Discount', 'discount_product');
    }

    public function discountPrice()
    {
        return round($this->price * (1-$this->discounts->first()->val), 2);
    }


    /*  SPECS   */

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
}