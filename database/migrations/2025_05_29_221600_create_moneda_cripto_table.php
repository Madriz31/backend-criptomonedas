<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moneda_cripto', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_moneda');
            $table->unsignedInteger('id_criptomoneda');

            // Define las foreign keys manualmente
            $table->foreign('id_moneda')->references('id_moneda')->on('moneda')->onDelete('cascade');
            $table->foreign('id_criptomoneda')->references('id_criptomoneda')->on('cripto')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moneda_cripto');
    }
};
