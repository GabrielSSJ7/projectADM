<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //

    protected $fillable = [
        'cod_forn','user_id', 'nome', 'endereco', 'telefone', 'created_at', 'update_at',
    ];

    protected $table = 'fornecedor';
}
