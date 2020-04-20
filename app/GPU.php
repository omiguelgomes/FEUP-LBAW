<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GPU extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.gpu';

  public static function list()
  {
    return $brands = GPU::pluck('name', 'id');
  }
}