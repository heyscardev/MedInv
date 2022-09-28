<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  [
            'c_i' => "0000000",
            'first_name' => "Super Admin",
            'last_name' => "Powerfull",
            'birth_date' => fake()->date(),
            'gender' => 'Male',
            'email' => 'admin@medinv.com',
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user1 = User::create($admin);
        $user1->assignRole('administrador');
        $admin =  [
            'c_i' => "0000001",
            'first_name' => "Employee",
            'last_name' => "Test",
            'birth_date' => fake()->date(),
            'gender' => 'Male',
            'email' => 'employee@medinv.com',
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user2 = User::create($admin);
        $user2->assignRole('empleado');
    }
}
