<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    //

    protected $fillable = [
          'cod_esto', 'cod_prod', 'qtde'
    ];

    protected $table = 'estoque';
}
