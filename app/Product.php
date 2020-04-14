<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Table name
    protected $table = 'product';
    //id
    public $pk = 'id';
    
}