<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //Table name
    public $timestamps  = false;
    protected $table = 'faq';
    protected $fillable = ['answer'];
}