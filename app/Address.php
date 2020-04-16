<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.address';

  public function city()
  {
      $city = $this->belongsTo('App\City', 'cityid')->get();
      return $city[0]->name;
  }
}
