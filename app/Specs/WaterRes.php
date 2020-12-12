<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class WaterRes extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.waterproofing';

  public static function list()
  {
    return WaterRes::pluck('value', 'id');
  }
}