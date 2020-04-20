<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.os';

  public static function list()
  {
    return $brands = OS::pluck('name', 'id');
  }
}