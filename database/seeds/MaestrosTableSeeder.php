<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class MaestrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('maestros')
          ->insert([[ 'titulo' => 'Escritorio', 'idpadre' => 1, 'ruta' => 'home', 'tipo' => 'ver'],
                    [ 'titulo' => 'Obras Sociales', 'idpadre' => 2, 'ruta' => 'medicina', 'tipo' => 'ver'],
                    [ 'titulo' => 'Configuración', 'idpadre' => 3, 'ruta' => '', 'tipo' => 'ver'],
                    [ 'titulo' => 'Usuarios', 'idpadre' => 4, 'ruta' => 'usuarios.create', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Roles', 'idpadre' => 5, 'ruta' => 'usuarios.index', 'tipo' => 'ver'],
                    [ 'titulo' => 'Cambiar Contraseña', 'idpadre' => 6, 'ruta' => 'resetPassword', 'tipo' => 'ver'],
                    [ 'titulo' => 'Profesionales', 'idpadre' => 7, 'ruta' => 'profesionales.index', 'tipo' => 'ver'],
                    [ 'titulo' => 'Liquidaciones', 'idpadre' => 8, 'ruta' => 'liquidaciones.index', 'tipo' => 'ver'],
                    [ 'titulo' => 'Pagos', 'idpadre' => 9, 'ruta' => 'pagos.index', 'tipo' => 'ver'],
       
                ]);
    }
}
