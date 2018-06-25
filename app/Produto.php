<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //

    protected $fillable = [
        'cod','cod_user','cod_forn', 'nome', 'tp_uni', 'preco', 'preco_fornecedor',
    ];

    protected $table = 'product';
}
