<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idpago');
            $table->unsignedInteger('idobra');
            $table->float('total_fact_odont', 12, 2)->nullable();
            $table->float('porcentaje_cobro', 12, 2)->nullable();
            $table->float('total', 12, 2)->nullable();
            $table->string('fecha')->nullable();
            $table->foreign('idpago')->references('id')->on('pagos');
            $table->foreign('idobra')->references('id')->on('obras');
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
        Schema::dropIfExists('pagos_items');
    }
}
