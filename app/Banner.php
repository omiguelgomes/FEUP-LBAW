<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'bannerimage';

  //make variables alterable
  protected $fillable = [
    'imgurl', 'image_id' 
  ];

  public function image()
    {
        return $this->belongsTo('App\Image');
    }
}