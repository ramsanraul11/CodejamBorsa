<?php

namespace Database\Seeders;

use App\Models\Empreses;
use App\Models\Estudis;
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


        Estudis::create([
            'nom' => 'Programació'
        ]);
        Estudis::create([
            'nom' => 'ASIX'
        ]);
        Estudis::create([
            'nom' => 'DAW'
        ]);
        Estudis::create([
            'nom' => 'CACA'
        ]);
        Estudis::create([
            'nom' => 'DEVACA'
        ]);
        Estudis::create([
            'nom' => 'HOLA'
        ]);

        Empreses::create([
            'nom' => 'empresa1',
            'email' => 'empresa1@test.com'
        ]);
        Empreses::create([
            'nom' => 'empresa2',
            'email' => 'empresa2@test.com'
        ]);
        Empreses::create([
            'nom' => 'empresa3',
            'email' => 'empresa3@test.com'
        ]);
    }
}
