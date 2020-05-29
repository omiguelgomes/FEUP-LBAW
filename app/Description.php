<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'description';
  protected $fillable = ['content'];
}
