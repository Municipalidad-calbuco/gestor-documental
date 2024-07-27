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
        Schema::create('distribucions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_oficina');
            $table->foreign('id_oficina')->references('id')->on('oficinas');
            $table->unsignedBigInteger('id_proceso');
            $table->foreign('id_proceso')->references('id')->on('procesos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribucions');
    }
};
