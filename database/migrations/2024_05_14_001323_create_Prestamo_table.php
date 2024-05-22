<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLibro'); // Changed to unsignedBigInteger
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
            $table->integer('numSocio'); 
            $table->foreign('idLibro')->references('id')->on('libros')->onDelete('cascade');
            $table->foreign('numSocio')->references('NumSocio')->on('lectores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamo');
    }
};
