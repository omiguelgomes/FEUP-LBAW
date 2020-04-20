<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamRes extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.camerares';

  public static function list()
  {
    return $cams = CamRes::pluck('value', 'id');
  }
}
