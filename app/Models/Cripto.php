<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cripto extends Model
{
    protected $table = 'cripto';
    protected $primaryKey = 'id_criptomoneda';

    protected $fillable = ['nombre', 'symbol'];

    public function monedas()
    {
        return $this->belongsToMany(Moneda::class, 'moneda_cripto', 'id_criptomoneda', 'id_moneda');
    }
}
