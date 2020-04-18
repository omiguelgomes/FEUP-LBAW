<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'public.users';

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
        $productList['products'] = [];
        $total = 0;
        foreach($list as $item)
        {
            $product = Product::find($item['productid']);
            $product['quantity'] = $item['quant'];
            $total += $product['quantity'] * $product['price'];
            array_push($productList['products'], $product);
        }
        $productList['total'] = $total;
        return $productList;
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'userid');
    }

    public function image()
    {
        return $this->belongsTo('App\Image', 'imageid');
    }

    public function purchases()
    {
        $purchasesList = $this->hasMany('App\Purchase', 'userid')->get();
        $purchases = [];
        $purchases['Awaiting Payment'] = [];
        $purchases['Processing'] = [];
        $purchases['Sent'] = [];
        $purchases['Delivered'] = [];

        foreach($purchasesList as $purchase)
        {
        array_push($purchases[$purchase->state['pstate']], $purchase->details());
        }

        return $purchases;
    }


    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'birthdate', 'password' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'isAdmin',
    ];

    
}
