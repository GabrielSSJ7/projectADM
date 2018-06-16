<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //

    protected $fillable = [
        'cod','cod_user', 'nome', 'tp_uni', 'preco',
    ];

    protected $table = 'product';
}
