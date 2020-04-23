<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $hidden = ['pivot'];

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function products()
    {
        return $this->belongsToMany('App\Product', 'discount_produt');
    }
}
