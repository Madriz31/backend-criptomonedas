<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('moneda_historico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_id'); // ID original de moneda
            $table->string('nombre', 100);
            $table->string('codigo', 10);
            $table->timestamp('archived_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moneda_historico');
    }
};
