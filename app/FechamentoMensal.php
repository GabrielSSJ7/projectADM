<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechamentoMensal extends Model
{
    //
    protected $fillable = [
        'user_id', 'saldo',
    ];

    protected $table = 'fechamento_mensal';

}
