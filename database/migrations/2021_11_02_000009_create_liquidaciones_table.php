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
            $table->float('colegio_alicuota', 24, 2)->nullable();
            $table->float('liquida_imp_gana', 24, 2)->nullable();
            $table->boolean('liquida_imp')->nullable(); 

            $table->float('compra_materiales', 24, 2)->nullable();
            $table->float('seguro_adicional', 24, 2)->nullable();
            $table->float('gastos_admin', 24, 2)->nullable();
            $table->float('aporte_caja', 24, 2)->nullable();
          
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
