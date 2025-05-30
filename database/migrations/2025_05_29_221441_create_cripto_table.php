<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cripto', function (Blueprint $table) {
            $table->increments('id_criptomoneda'); // IMPORTANTE: usar increments()
            $table->string('nombre', 100);
            $table->string('symbol', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cripto');
    }
};
