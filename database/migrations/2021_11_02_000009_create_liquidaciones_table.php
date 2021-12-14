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
            $table->float('federacion_cuota', 24, 2)->nullable();
            $table->float('colegio_cuota', 24, 2)->nullable();
            $table->float('factura_federacion', 24, 2)->nullable();
            $table->float('factura_colegio', 24, 2)->nullable();



          
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
