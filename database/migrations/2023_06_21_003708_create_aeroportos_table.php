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
        Schema::create('aeroportos', function (Blueprint $table) {
            $table->bigIncrements('cd_aeroporto');
            $table->string('nome');
            $table->string('codigo_iata')->unique();
            $table->unsignedBigInteger('cd_cidade');
            $table->foreign('cd_cidade')->references('cd_cidade')->on('cidades')->constrained('cidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeroportos');
    }
};
