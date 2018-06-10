<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //

    protected $fillable = [
        'cod', 'nome', 'tp_uni', 'preco',
    ];

    protected $table = 'product';
}
