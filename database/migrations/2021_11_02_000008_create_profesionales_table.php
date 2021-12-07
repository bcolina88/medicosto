<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('matricula')->nullable();
            $table->boolean('active');
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('telefono')->nullable();
            $table->text('datos_complementarios')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('lugar')->nullable();
            $table->string('cuit')->nullable();
            $table->boolean('retiene_ganancia')->nullable();

            $table->string('banco')->nullable();
            $table->string('tipo_cuenta')->nullable();
            $table->string('num_cuenta')->nullable();

            $table->float('ingreso_bruto', 24, 2)->nullable();;
            
            $table->string('tipo_ingreso_bruto')->nullable();
            $table->string('cond_iva')->nullable();
            $table->string('fecha_ingreso_coc')->nullable();
            $table->string('fecha_desde')->nullable();
            $table->string('fecha_hasta')->nullable();

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
        Schema::dropIfExists('profesionales');
    }
}
