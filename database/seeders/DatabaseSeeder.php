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

        \App\Models\User::factory(20)->create();
        \App\Models\Doctor::factory(20)->create();
        \App\Models\Patient::factory(20)->create([
            'gender'=>'MALE'
        ]);

        $this->call([
            UserSeeder::class,
            UnitSeeder::class,
            MedicamentSeeder::class
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
