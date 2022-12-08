<?php

namespace Database\Seeders;

use App\Models\Buy;
use App\Models\Doctor;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Pathology;
use App\Models\Patient;
use App\Models\Recipe;
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
        
 */
        Doctor::factory(200)->create();
        Patient::factory(200)->create([
            'gender' => 'MALE'
        ]);
        Pathology::factory(200)->create();
        
       /*  Transfer::factory(200)->hasAttached(
            Medicament::orderByRaw("RAND()")->limit(rand(1, 20))->get(),
            ['quantity' => 10]
        )->create(); */

      Buy::factory(200)->hasAttached(
            Medicament::orderByRaw('RAND()')->limit(rand(1, 12))->get(),
            function () {
                return [
                    'price' => rand(0, 999999),
                    'quantity' => rand(0, 10)
                ];
            },
        )->create();  /* 
        Recipe::factory(200)->hasAttached(
            Medicament::orderByRaw('RAND()')->limit(rand(1, 12))->get(),
            function () {
                return [
                    'quantity' => rand(0, 20),
                    'prescribed_amount' => rand(0, 20),
                    
                ];
            },
        )->create();
 */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
