<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //


    protected $fillable = [
        'cod_esto', 'qtde'
    ];

    protected $table = "entrada";
}
