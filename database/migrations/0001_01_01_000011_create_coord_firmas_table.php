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
        Schema::create('coord_firmas', function (Blueprint $table) {
            $table->id();
            $table->string('llx');
            $table->string('lly');
            $table->string('urx');
            $table->string('ury');
            $table->string('page');
            $table->unsignedBigInteger('id_archivo');
            $table->foreign('id_archivo')->references('id')->on('archivos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coord_firmas');
    }
};
