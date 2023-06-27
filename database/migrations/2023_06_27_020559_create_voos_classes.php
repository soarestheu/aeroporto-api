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
        Schema::create('voos_classes', function (Blueprint $table) {
            $table->bigIncrements('cd_voo_classe');
            $table->unsignedBigInteger('cd_voo');
            $table->unsignedBigInteger('cd_classe');
            $table->foreign('cd_voo')->references('cd_voo')->on('voos')->onDelete('cascade');
            $table->foreign('cd_classe')->references('cd_classe')->on('classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voos_classes');
    }
};
