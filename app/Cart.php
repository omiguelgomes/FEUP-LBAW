<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.cart';

  //so that it works with composite key
  protected $primaryKey = null;
  public $incrementing = false;

  //make variables alterable
  protected $fillable = [
    'userID', 'productID', 'quant' 
  ];
}
