<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class FingerPrintType extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.fingerprinttype';

  public static function list()
  {
    return FingerPrintType::pluck('value', 'id');
  }
}