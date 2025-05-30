<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonedaHistorico extends Model
{
    protected $table = 'moneda_historico';

    protected $fillable = [
        'original_id',
        'nombre',
        'codigo',
        'archived_at',
    ];
}
