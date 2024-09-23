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
        Schema::create('firmadors', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('En espera');
            $table->dateTime('fecha_firma')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_cargo')->nullable();
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->unsignedBigInteger('id_archivo')->nullable();;
            $table->foreign('id_archivo')->references('id')->on('archivos');
            $table->unsignedBigInteger('id_coord')->nullable();;
            $table->foreign('id_coord')->references('id')->on('coord_firmas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firmadors');
    }
};
