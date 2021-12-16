<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idpago');
            $table->unsignedInteger('idprofesional');
            

            $table->string('nombre');
            $table->float('valor', 12, 2)->nullable();
            $table->float('total_descuento', 12, 2)->nullable();
           

            $table->string('fecha')->nullable();
            $table->foreign('idpago')->references('id')->on('pagos');
            $table->foreign('idprofesional')->references('id')->on('profesionales');
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
        Schema::dropIfExists('descuentos');
    }
}
