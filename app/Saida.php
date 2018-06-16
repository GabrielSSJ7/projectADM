<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    //


    protected $fillable = [
        'cod_esto', 'qtde','qtde_old' ,'created_at', 'updated_at'
    ];

    protected $table = "saida";
}
