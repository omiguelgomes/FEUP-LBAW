<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.battery';

  public static function list()
  {
    return Battery::pluck('value', 'id');
  }
}