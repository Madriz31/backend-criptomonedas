<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Moneda;
use App\Models\MonedaHistorico;
use App\Models\Cripto;
use App\Models\CriptoHistorico;
use App\Models\MonedaCriptoHistorico;

class ArchiveCryptoCurrencyData extends Command
{
    protected $signature = 'archive:cryptocurrency';

    protected $description = 'Archivar datos de monedas, criptos y su relación a tablas históricas y borrar los registros originales';

    public function handle()
    {
        DB::transaction(function () {

            // Archivar monedas
            $monedas = Moneda::all();
            foreach ($monedas as $moneda) {
                MonedaHistorico::create([
                    'original_id' => $moneda->id_moneda,
                    'nombre' => $moneda->nombre,
                    'codigo' => $moneda->codigo,
                    'archived_at' => now(),
                ]);
            }

            // Archivar criptos
            $criptos = Cripto::all();
            foreach ($criptos as $cripto) {
                CriptoHistorico::create([
                    'original_id' => $cripto->id_criptomoneda,
                    'nombre' => $cripto->nombre,
                    'symbol' => $cripto->symbol,
                    'archived_at' => now(),
                ]);
            }

            // Archivar relación moneda_cripto
            $relaciones = DB::table('moneda_cripto')->get();
            foreach ($relaciones as $rel) {
                MonedaCriptoHistorico::create([
                    'original_id' => $rel->id,
                    'id_moneda' => $rel->id_moneda,
                    'id_criptomoneda' => $rel->id_criptomoneda,
                    'archived_at' => now(),
                ]);
            }

            // Borrar registros originales
            DB::table('moneda_cripto')->delete();
            Cripto::query()->delete();
            Moneda::query()->delete();
        });

        $this->info('Datos archivados y registros originales eliminados correctamente.');
    }
}
