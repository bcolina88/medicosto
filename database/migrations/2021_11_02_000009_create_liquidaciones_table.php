<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fecha')->nullable();
            $table->integer('federacion_cuota')->nullable();
            $table->integer('colegio_cuota')->nullable();
            $table->integer('colegio_alicuota')->nullable();
            $table->boolean('liquida_imp')->nullable();           
           
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
        Schema::drop('liquidaciones');
    }
}
