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
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_cargo');
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->unsignedBigInteger('id_archivo');
            $table->foreign('id_archivo')->references('id')->on('archivos');
            $table->unsignedBigInteger('id_coord');
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
