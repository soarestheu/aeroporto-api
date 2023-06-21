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
        Schema::create('bagagens', function (Blueprint $table) {
            $table->bigIncrements('cd_bagagem');
            $table->string('numero_identificacao');
            $table->unsignedBigInteger('cd_passagem');
            $table->foreign('cd_passagem')->references('cd_passagem')->on('passagens')->constrained('passagens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bagagens');
    }
};
