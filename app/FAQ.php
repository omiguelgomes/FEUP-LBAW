<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //Table name
    protected $table = 'faq';
    //id
    public $pk = 'id';
    //question
    public $questionText = 'question'; 
    //answer
    public $answerText = 'answer';
    //public timestamps
    public $timestamps = true;

    //Nota, fsr, se o nome da variavel for igual a variavel na tabela, nao funciona
}