<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'image_product';

  public function image()
  {
    return $this->belongsTo('App\Image', 'imageid');
  }
}
