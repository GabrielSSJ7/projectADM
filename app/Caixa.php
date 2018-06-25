<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    //
    protected $fillable = [
        'user_id', 'saldo',
    ];

    protected $table = 'caixa';
}
