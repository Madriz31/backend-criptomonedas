<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->increments('id_moneda'); // IMPORTANTE: usar increments() para PK
            $table->string('nombre', 100);
            $table->string('codigo', 10)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moneda');
    }
};

