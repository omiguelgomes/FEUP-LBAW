<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.ram';

  public static function list()
  {
    return $brands = RAM::pluck('value', 'id');
  }
}