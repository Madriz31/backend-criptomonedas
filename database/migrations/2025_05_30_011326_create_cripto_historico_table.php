<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cripto_historico', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('original_id'); // ID original de cripto (ajusta tipo si usas increments)
            $table->string('nombre', 100);
            $table->string('symbol', 10);
            $table->timestamp('archived_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cripto_historico');
    }
};
