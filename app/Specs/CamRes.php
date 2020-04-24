<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class CamRes extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'camerares';

  public static function list()
  {
    return CamRes::pluck('value', 'id');
  }
}
