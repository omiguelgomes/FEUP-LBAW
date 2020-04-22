<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.city';

  public function country()
  {
    return $this->belongsTo('App\Country');
  }
}
