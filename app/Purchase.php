<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'purchase';
  protected $fillable = [
    'val', 'status_id', 'paid', 'user_id', 'purchasedate'
  ];

  public static function list() {
    return Purchase::all();
  }

  public function status()
  {
    return $this->belongsTo('App\PurchaseState', 'status_id');
  }

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product', 'product_purchase')->withPivot('quantity');
  }

}
