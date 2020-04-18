<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.cart';

  protected $fillable = [
    'userID', 'productID', 'quant' 
  ];
}
