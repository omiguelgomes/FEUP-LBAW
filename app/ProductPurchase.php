<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
  public $timestamps  = false;
  protected $table = 'public.product_purchase';
  protected $fillable = [
    'product_id', 'purchase_id', 'quantity'
  ];
}
