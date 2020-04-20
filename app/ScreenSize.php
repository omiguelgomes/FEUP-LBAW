<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScreenSize extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.screensize';

  public static function list()
  {
    return $brands = ScreenSize::pluck('value', 'id');
  }
}