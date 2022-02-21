<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'password' => Hash::make('testtesttest'),
            'isCoordinador' => false
        ]);
        $u2 = User::create([
            'name' => 'raul',
            'surname' => 'ramirez',
            'email' => 'raul@test.com',
            'password' => Hash::make('raulraulraul'),
            'isCoordinador' => true
        ]);
        $u3 = User::create([
            'name' => 'amina',
            'surname' => 'khyat',
            'email' => 'amina@test.com',
            'password' =>  Hash::make('aminaaminaamina'),
            'isCoordinador' => true
        ]);
        $u4 = User::create([
            'name' => 'adrian',
            'surname' => 'naise',
            'email' => 'adrian@test.com',
            'password' => Hash::make('adrianadrian'),
            'isCoordinador' => false
        ]);

        Estudis::create([
            'nom' => 'Programació'
        ]);
    }
}
