<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseState extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'purchasestate';

  protected $fillable = [
    'statechangedate', 'comment', 'pstate'
  ];
}
