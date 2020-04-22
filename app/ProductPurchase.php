<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
  public $timestamps  = false;
  protected $table = 'public.product_purchase';
  protected $primaryKey = null;
  public $incrementing = false;
  protected $fillable = array('product_id', 'purchase_id');
  //check if all these are necessary
}
