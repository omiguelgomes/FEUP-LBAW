<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;

  protected $table = 'rating';

  protected $fillable = ['user_id', 'product_id', 'content', 'val'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
