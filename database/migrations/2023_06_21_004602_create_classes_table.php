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
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cd_classe');
            $table->string('tipo');
            $table->integer('quantidade_assentos');
            $table->decimal('valor_assento', 8, 2);
            $table->unsignedBigInteger('cd_voo');
            $table->foreign('cd_voo')->references('cd_voo')->on('voos')->constrained('voos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
