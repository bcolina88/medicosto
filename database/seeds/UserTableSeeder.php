<?php
use App\Model\User;
use App\Model\Obra;
use App\Model\Profesional;

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
       'sueldo'=> 0,
       'contacto_emergencia' => '',
       'fecha_contrato'=> '',
       'fecha_despido'=> '',
       'images'=> '',

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
       'sueldo'=> 0,
       'contacto_emergencia' => '',
       'fecha_contrato'=> '',
       'fecha_despido'=> '',
       'images'=> '',

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
       'sueldo'=> 0,
       'contacto_emergencia' => '',
       'fecha_contrato'=> '',
       'fecha_despido'=> '',
       'images'=> '',

       ]);


        Obra::create([
            'nombre'=> 'Obra1',
            'active'=> 1,
        ]);

        Obra::create([
            'nombre'=> 'Obra2',
            'active'=> 1,
        ]);
        Obra::create([
            'nombre'=> 'Obra3',
            'active'=> 1,
        ]);
        Obra::create([
            'nombre'=> 'Obra4',
            'active'=> 1,
        ]);
        Obra::create([
            'nombre'=> 'Obra4',
            'active'=> 1,
        ]);


        $p = factory(App\Model\Profesional::class, 12)->create([

         'fecha_nacimiento'=> '',
         'fecha_desde'=> '',
         'fecha_hasta'=> '',

        ]);




    }
}
