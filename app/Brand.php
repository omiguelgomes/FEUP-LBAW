<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.brand';

  public function image()
  {
    return $this->belongsTo('App\Image');
  }

  public static function list()
  {
    return $brands = Brand::pluck('name', 'id');
  }
}
