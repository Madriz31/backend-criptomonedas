<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moneda_cripto_historico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_id'); // Id del registro original (opcional para trazabilidad)
            $table->unsignedBigInteger('id_moneda');
            $table->unsignedInteger('id_criptomoneda');
            $table->timestamp('archived_at')->useCurrent();
            $table->timestamps();

            // Opcional: agregar claves foráneas (SQLite puede tener limitaciones)
            $table->foreign('id_moneda')->references('id_moneda')->on('moneda')->onDelete('cascade');
            $table->foreign('id_criptomoneda')->references('id_criptomoneda')->on('cripto')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moneda_cripto_historico');
    }
};
