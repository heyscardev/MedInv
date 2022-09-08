<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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



        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            UnitSeeder::class,
            MedicamentSeeder::class
        ]);

        \App\Models\User::factory(200)->afterCreating(function($user){
            $user->assignRole('empleado');
        })->create();
        \App\Models\Doctor::factory(200)->create();
        \App\Models\Patient::factory(200)->create([
            'gender'=>'MALE'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
