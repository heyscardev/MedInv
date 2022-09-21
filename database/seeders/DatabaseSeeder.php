<?php

namespace Database\Seeders;

use App\Models\Buy;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Transfer;
use App\Models\User;
use Database\Factories\ModuleFactory;
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
        //seders de prueba
        /* User::factory(20)->afterCreating(function ($user) {
            $user->assignRole('empleado');
        })->create();
        \App\Models\Doctor::factory(200)->create();
        \App\Models\Patient::factory(200)->create([
            'gender' => 'MALE'
        ]);
 */
        Module::factory(20)->create();
        Transfer::factory(2000)->hasAttached(
            Medicament::orderByRaw("RAND()")->limit(rand(1, 20))->get(),
            ['quantity' => 10]
        )->create();

        Buy::factory(2000)->hasAttached(
            Medicament::orderByRaw('RAND()')->limit(rand(1, 12))->get(),
            function () {
                return [
                    'price' => rand(0, 999999),
                    'quantity' => rand(0, 10)
                ];
            },
        )->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
