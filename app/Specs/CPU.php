<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'cpu';

  public static function list()
  {
    return CPU::pluck('name', 'id');
  }
}
