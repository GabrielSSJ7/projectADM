<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    //


    protected $fillable = [
        'cod_esto', 'qtde'
    ];

    protected $table = "saida";
}
