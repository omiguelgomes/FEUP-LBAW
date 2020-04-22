<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'public.purchase';

  public function state()
  {
    return $this->belongsTo('App\PurchaseState', 'status_id');
  }

  public function details()
  {
    $pPurchase = $this->hasMany('App\ProductPurchase', 'purchase_id')->get();
    $returnList = [];

    foreach($pPurchase as $pp)
    {
      $newItem = [];
      $newItem = $pp->belongsTo('App\Product', 'product_id')->get()->first();
      $newItem['quantity'] = $pp->quantity;
      array_push($returnList, $newItem);
    }
    return $returnList;

  }
}
