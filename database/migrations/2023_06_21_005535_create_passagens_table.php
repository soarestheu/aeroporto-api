<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passagens', function (Blueprint $table) {
            $table->bigIncrements('cd_passagem');
            $table->string('numero_identificacao');
            $table->decimal('preco_total', 8, 2);

            $table->unsignedBigInteger('cd_classe');
            $table->foreign('cd_classe')->references('cd_classe')->on('classes')->constrained('classes');

            $table->unsignedBigInteger('cd_voo');
            $table->foreign('cd_voo')->references('cd_voo')->on('voos')->constrained('voos');

            $table->unsignedBigInteger('cd_passageiro');
            $table->foreign('cd_passageiro')->references('cd_passageiro')->on('passageiros')->constrained('passageiros');

            $table->unsignedBigInteger('cd_comprador');
            $table->foreign('cd_comprador')->references('cd_comprador')->on('compradores')->constrained('compradores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passagens');
    }
};
