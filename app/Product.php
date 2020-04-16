<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Specs\WaterProofing;

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

    public function specs()
    {
        $specs = [];
        $specs['cpu'] = $this->belongsTo('App\Specs\Cpu', 'cpuid')->first();
        $specs['ram'] = $this->belongsTo('App\Specs\Ram', 'ramid')->first();
        $specs['waterproofing'] = $this->belongsTo('App\Specs\WaterProofing', 'waterproofingid')->first();
        $specs['os'] = $this->belongsTo('App\Specs\Os', 'osid')->first();
        $specs['gpu'] = $this->belongsTo('App\Specs\Gpu', 'gpuid')->first();
        $specs['screensize'] = $this->belongsTo('App\Specs\ScreenSize', 'screensizeid')->first();
        $specs['weight'] = $this->belongsTo('App\Specs\Weight', 'weightid')->first();
        $specs['storage'] = $this->belongsTo('App\Specs\Storage', 'storageid')->first();
        $specs['battery'] = $this->belongsTo('App\Specs\Battery', 'batteryid')->first();
        $specs['weight'] = $this->belongsTo('App\Specs\Weight', 'weightid')->first();
        $specs['screenres'] = $this->belongsTo('App\Specs\ScreenRes', 'screenresid')->first();
        $specs['camerares'] = $this->belongsTo('App\Specs\CameraRes', 'cameraresid')->first();
        $specs['fingerprint'] = $this->belongsTo('App\Specs\FingerprintType', 'fingerprinttypeid')->first();

        return $specs;
    }
}