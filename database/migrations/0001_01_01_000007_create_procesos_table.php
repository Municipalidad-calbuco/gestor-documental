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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('estado')->default('En Proceso');
            $table->timestamp('fecha_inicio'); // Cambiar timestamps a timestamp
            $table->dateTime('fecha_final')->nullable();
            $table->unsignedBigInteger('id_tipo_doc');
            $table->foreign('id_tipo_doc')->references('id')->on('tipo_documentos');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
