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
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->integer('numSocio'); 
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('numSocio')->references('NumSocio')->on('lectores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multas');
    }
    
};