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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo');
            $table->string('id_google_drive');
            $table->string('tipo_archivo')->nullable();
            $table->unsignedBigInteger('id_oficina')->nullable();
            $table->foreign('id_oficina')->references('id')->on('oficinas');
            $table->unsignedBigInteger('id_info');
            $table->foreign('id_info')->references('id')->on('info_documentos');
            $table->unsignedBigInteger('id_proceso')->nullable();
            $table->foreign('id_proceso')->references('id')->on('procesos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
