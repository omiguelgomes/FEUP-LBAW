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
    return $this->belongsTo('App\PurchaseState', 'statusid');
  }

  public function details()
  {
    $pPurchase = $this->hasMany('App\ProductPurchase', 'purchaseid')->get();
    $returnList = [];

    foreach($pPurchase as $pp)
    {
      $newItem = [];
      $newItem = $pp->belongsTo('App\Product', 'productid')->get()->first();
      $newItem['quantity'] = $pp->quantity;
      array_push($returnList, $newItem);
    }
    return $returnList;

  }
}
