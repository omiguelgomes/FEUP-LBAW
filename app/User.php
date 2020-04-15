<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Product;

class User extends Authenticatable
{
    protected $table = 'users';

    public function wishlist()
    {
        $list = $this->hasMany('App\Wishlist', 'userid')->get();
        $productList = [];
        foreach($list as $item)
        {
            array_push($productList, Product::find($item['productid']));
        }
        return $productList;
    }

    public function cart()
    {
        $list = $this->hasMany('App\Cart', 'userid')->get();
        $productList = [];
        foreach($list as $item)
        {
            $product = Product::find($item['productid']);
            $product['quantity'] = $item['quant'];
            
            array_push($productList, $product);
        }
        return $productList;
    }


    //Template stuff
    // use Notifiable;

    // // Don't add create and update timestamps in database.
    // public $timestamps  = false;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // /**
    //  * The cards this user owns.
    //  */
    //  public function cards() {
    //   return $this->hasMany('App\Card');
    // }
}
