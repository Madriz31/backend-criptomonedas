<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriptoHistorico extends Model
{
    protected $table = 'cripto_historico';

    protected $fillable = [
        'original_id',
        'nombre',
        'symbol',
        'archived_at',
    ];
}
