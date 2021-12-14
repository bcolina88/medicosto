<?php
use App\Model\User;
use App\Model\Obra;
use App\Model\Profesional;
use App\Model\Liquidacion;

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       'nombre' => 'Admin',
       'apellido' => 'Admin',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'admin1@admin.com',
       'password' => bcrypt('secret'),
       'domicilio' => '',
       'fecha_nacimiento'=> '',
       'telefono'=> '',
       'contacto_emergencia' => '',

       ]);


       User::create([
       'nombre' => 'Admin',
       'apellido' => 'Admin',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'admin2@admin.com',
       'password' => bcrypt('secret'),
       'domicilio' => '',
       'fecha_nacimiento'=> '',
       'telefono'=> '',
       'contacto_emergencia' => '',

       ]);


       User::create([
       'nombre' => 'Admin',
       'apellido' => 'Admin',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'admin3@admin.com',
       'password' => bcrypt('secret'),
       'domicilio' => '',
       'fecha_nacimiento'=> '',
       'telefono'=> '',
       'contacto_emergencia' => '',

       ]);



        $o = factory(App\Model\Obra::class, 12)->create([]);


        $p = factory(App\Model\Profesional::class, 12)->create([

         'fecha_nacimiento'=> '',
         'fecha_desde'=> '',
         'fecha_hasta'=> '',

        ]);


        Liquidacion::create([
             'fecha'       => '08-12-2021',
             'federacion_cuota'       => 3742.00,
             'colegio_cuota'          => 200.00,
             'factura_colegio'        => 8.00,
             'factura_federacion'     => 2.50,

       ]);




    }
}
