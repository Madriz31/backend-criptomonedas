<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonedaCriptoHistorico extends Model
{
    protected $table = 'moneda_cripto_historico';

    protected $fillable = [
        'original_id',
        'id_moneda',
        'id_criptomoneda',
        'archived_at',
    ];
}
