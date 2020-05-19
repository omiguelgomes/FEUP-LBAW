<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Specs\WaterProofing;

class Product extends Model
{
    //Table name
    protected $table = 'product';
    public $timestamps  = false;
    protected $hidden = [
        'pivot', 'battery_id', 'brand_id',
        'camerares_id', 'cpu_id', 'gpu_id', 'os_id', 'ram_id', 'screenres_id',
        'screensize_id', 'storage_id', 'waterproofing_id', 'weight_id', 'image_id'
    ];
    protected $fillable = [
        'stock',
        'price',
        'model',
        'category',
        'brand_id',
        'cpu_id',
        'ram_id',
        'waterproofing_id',
        'os_id',
        'gpu_id',
        'screensize_id',
        'weight_id',
        'storage_id',
        'battery_id',
        'screenres_id',
        'camerares_id',
        'fingerprinttype_id'
    ];
    protected $with = [
        'ram', 'waterProofing', 'screensize', 'storage',
        'battery', 'fingerprinttype', 'brand', 'images'
    ];

    public static function list()
    {
        return Product::select('id', 'stock', 'model')->get();
    }

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

    public function description()
    {
        return $this->belongsTo('App\Description');
    }

    public function discounts()
    {
        return $this->belongsToMany('App\Discount', 'discount_product')->where('begindate', '<=', date("Y-m-d"))->where('enddate', '>=', date("Y-m-d"));
    }

    //includes discounts from the past
    public function allDiscounts()
    {
        return $this->belongsToMany('App\Discount', 'discount_product');
    }

    //override access to attribute price, so that it is updated with the discount
    public function getPriceAttribute($price)
    {
        if (count($this->discounts) > 0) {
            return round($price * (1 - $this->discounts->first()->val), 2);
        }
        return $price;
    }

    public function originalPrice()
    {
        return round($this->price / (1 - $this->discounts->first()->val), 2);
    }

    public function averageRating()
    {
        return round($this->ratings->average('val'), 1);
    }

    /*  SPECS   */

    public function getCpuDetailsAttribute()
    {
        return $this->cpu;
    }

    public function cpu()
    {
        return $this->belongsTo('App\Specs\CPU');
    }
    public function ram()
    {
        return $this->belongsTo('App\Specs\RAM');
    }
    public function waterproofing()
    {
        return $this->belongsTo('App\Specs\WaterRes');
    }
    public function os()
    {
        return $this->belongsTo('App\Specs\OS');
    }
    public function gpu()
    {
        return $this->belongsTo('App\Specs\GPU');
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
        return $this->belongsTo('App\Specs\CamRes');
    }
    public function fingerprinttype()
    {
        return $this->belongsTo('App\Specs\FingerPrintType');
    }
}
