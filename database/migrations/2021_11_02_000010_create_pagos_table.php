<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fecha')->nullable();
            $table->integer('importe')->nullable();

            $table->integer('idliquidacion')->unsigned()->index();
            $table->integer('idprofesional')->unsigned()->index();
            $table->integer('idobra')->unsigned()->index();

            $table->foreign('idliquidacion')->references('id')->on('liquidaciones')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idprofesional')->references('id')->on('profesionales')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idobra')->references('id')->on('obras')
            ->onUpdate('cascade')
            ->onDetete('cascade');
           


           
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
        Schema::drop('pagos');
    }
}
