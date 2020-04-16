<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'brand';

  public function image()
    {
        return $this->belongsTo('App\Image', 'imageid');
    }
}
