<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.cpu';

  public static function list()
  {
    return $brands = CPU::pluck('name', 'id');
  }
}
