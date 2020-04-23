<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.storage';

  public static function list()
  {
    return Storage::pluck('value', 'id');
  }
}