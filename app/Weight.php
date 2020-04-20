<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.weight';

  public static function list()
  {
    return $brands = Weight::pluck('value', 'id');
  }
}