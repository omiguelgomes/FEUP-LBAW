<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class GPU extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.gpu';

  public static function list()
  {
    return GPU::pluck('name', 'id');
  }
}