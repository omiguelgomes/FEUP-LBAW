<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.purchase';
  protected $fillable = [
    'val', 'status_id', 'paid', 'user_id', 'purchasedate'
  ];

  public function status()
  {
    return $this->belongsTo('App\PurchaseState', 'status_id');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product', 'product_purchase')->withPivot('quant');
  }

}
