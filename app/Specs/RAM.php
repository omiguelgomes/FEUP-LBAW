<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.ram';

  public static function list()
  {
    return RAM::pluck('value', 'id');
  }
}