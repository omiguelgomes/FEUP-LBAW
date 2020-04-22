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

    public function image()
    {
        $images = $this->hasMany('App\ImageProduct')->get();
        $paths = [];
        foreach($images as $image)
        {
            array_push($paths, $image->image->path);
        }
        return $paths;
    }

    //dado que o nome desta funcao nao e o do atributo a retornar, nao podemos omitir o nome da coluna em belongsTo
    public function specs()
    {
        $specs = [];
        $specs['cpu'] = $this->belongsTo('App\Specs\Cpu', 'cpu_id')->first();
        $specs['ram'] = $this->belongsTo('App\Specs\Ram', 'ram_id')->first();
        $specs['waterproofing'] = $this->belongsTo('App\Specs\WaterProofing', 'waterproofing_id')->first();
        $specs['os'] = $this->belongsTo('App\Specs\Os', 'os_id')->first();
        $specs['gpu'] = $this->belongsTo('App\Specs\Gpu', 'gpu_id')->first();
        $specs['screensize'] = $this->belongsTo('App\Specs\ScreenSize', 'screensize_id')->first();
        $specs['weight'] = $this->belongsTo('App\Specs\Weight', 'weight_id')->first();
        $specs['storage'] = $this->belongsTo('App\Specs\Storage', 'storage_id')->first();
        $specs['battery'] = $this->belongsTo('App\Specs\Battery', 'battery_id')->first();
        $specs['weight'] = $this->belongsTo('App\Specs\Weight', 'weight_id')->first();
        $specs['screenres'] = $this->belongsTo('App\Specs\ScreenRes', 'screenres_id')->first();
        $specs['camerares'] = $this->belongsTo('App\Specs\CameraRes', 'camerares_id')->first();
        $specs['fingerprint'] = $this->belongsTo('App\Specs\FingerprintType', 'fingerprinttype_id')->first();

        return $specs;
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

}