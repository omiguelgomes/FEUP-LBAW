<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FingerPrintType extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.fingerprinttype';

  public static function list()
  {
    return $cams = FingerPrintType::pluck('value', 'id');
  }
}