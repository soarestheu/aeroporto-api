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
        Schema::create('voos', function (Blueprint $table) {
            $table->bigIncrements('cd_voo');
            $table->string('numero');
            $table->unsignedBigInteger('cd_aeroporto_origem');
            $table->unsignedBigInteger('cd_aeroporto_destino');
            $table->foreign('cd_aeroporto_origem')->references('cd_aeroporto')->on('aeroportos')->constrained('aeroportos');
            $table->foreign('cd_aeroporto_destino')->references('cd_aeroporto')->on('aeroportos')->constrained('aeroportos');
            $table->date('data_partida');
            $table->time('hora_partida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voos');
    }
};
