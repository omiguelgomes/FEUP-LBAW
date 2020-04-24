<?php

namespace App\Specs;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'weight';

  public static function list()
  {
    return Weight::pluck('value', 'id');
  }
}