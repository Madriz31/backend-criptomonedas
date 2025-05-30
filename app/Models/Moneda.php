<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'moneda';
    protected $primaryKey = 'id_moneda';

    protected $fillable = ['nombre', 'codigo'];

    public function criptomonedas()
    {
        return $this->belongsToMany(Cripto::class, 'moneda_cripto', 'id_moneda', 'id_criptomoneda');
    }
}
