<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'wishlist';
}
