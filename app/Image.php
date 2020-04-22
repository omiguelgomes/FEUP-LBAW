<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.image';

  public function imageProduct()
  {
      return $this->belongsTo('App\ImageProduct');
  }
}
