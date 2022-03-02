<?php

namespace Database\Seeders;

use App\Models\Empreses;
use App\Models\Estudis;
use App\Models\EstudisUser;
use App\Models\Ofertes;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $u1 = User::create([
            'name' => 'test',
            'surname' => 'test testing',
            'email' => 'test@test.com',
            'dni' => '23455g',
            'telefon' => 73738393,
            'password' => Hash::make('testtesttest'),

        ]);

        $u2 = User::create([
            'name' => 'test2',
            'surname' => 'test testing',
            'email' => 'test2@test.com',
            'dni' => '23455g',
            'telefon' => 73738393,
            'password' => Hash::make('testtesttest'),
        ]);


        $s1= Estudis::create([
            'nom' => 'Programació'
        ]);
        $s2 = Estudis::create([
            'nom' => 'ASIX'
        ]);
        $s3 =Estudis::create([
            'nom' => 'DAW'
        ]);
        $s4 = Estudis::create([
            'nom' => 'CACA'
        ]);
        $s5 = Estudis::create([
            'nom' => 'DEVACA'
        ]);
        $s6 = Estudis::create([
            'nom' => 'HOLA'
        ]);

        $e1 = Empreses::create([
            'nom' => 'empresa1',
            'email' => 'empresa1@test.com'
        ]);

        $e2 =Empreses::create([
            'nom' => 'empresa2',
            'email' => 'empresa2@test.com'
        ]);
        $e3 = Empreses::create([
            'nom' => 'empresa3',
            'email' => 'empresa3@test.com'
        ]);

        $o1 = Ofertes::create([
            'descripcio' => 'Oferta per C#',
            'pendentEnviament' => true
            //'IdEmpresa' => $e1->IdEmpresa
        ]);

        $o2 = Ofertes::create([
            'descripcio' => 'Oferta per Java',
            'pendentEnviament' => true
        ]);

        $o3 = Ofertes::create([
            'descripcio' => 'Oferta per Javascript',
            'pendentEnviament' => true
        ]);

        $o1->empreses()->associate($e1)->save();
        $o2->empreses()->associate($e2)->save();
        $o3->empreses()->associate($e3)->save();

        $o1->estudis()->attach($s1);
        $o2->estudis()->attach($s3);
        $o3->estudis()->attach($s2);

       /* $eu1 = EstudisUser::create([
            'AnyPromocio' => 2001
        ]);

        $eu1->users()->attach($u2);
        $eu1->estudis()->attach($e1);*/
    }
}
