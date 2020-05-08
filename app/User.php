<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

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
        'password', 'isadmin'
    ];

    public static function list_admins()
    {
        return User::select('id', 'name', 'email')->where("isadmin", true)->get();;
    }

    public static function list_users()
    {
        return User::select('id', 'name', 'email')->where("isadmin", false)->get();;
    }

    public function cart()
    {
        return $this->belongsToMany('App\Product', 'cart')->withPivot('quant');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\Product', 'wishlist');
    }

    public function address()
    {
        return $this->hasMany('App\Address');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'user_id');
    }
}