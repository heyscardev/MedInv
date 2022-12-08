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
        $userProps =  [
            'c_i' => "0000001",
            'nationality'=>fake()->randomElement(['V','E']),
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
        $user = User::create($userProps);
        $user->assignRole('administrador');

        $userProps =  [
            'c_i' => "000002",
            'nationality'=>fake()->randomElement(['V','E']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male','Female']),
            'email' => 'employee@medinv.com',
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user = User::create($userProps);
        $user->assignRole('empleado');
     
        $userProps =  [
            'c_i' => "000003",
            'nationality'=>fake()->randomElement(['V','E']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male','Female']),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user = User::create($userProps);
        $user->assignRole('empleado');
        $userProps =  [
            'c_i' => "000004",
            'nationality'=>fake()->randomElement(['V','E']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male','Female']),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user = User::create($userProps);
        $user->assignRole('empleado');
        $userProps =  [
            'c_i' => "00005",
            'nationality'=>fake()->randomElement(['V','E']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male','Female']),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user = User::create($userProps);
        $user->assignRole('empleado');
        $userProps =  [
            'c_i' => "00000006",
            'nationality'=>fake()->randomElement(['V','E']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male','Female']),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        $user = User::create($userProps);
        $user->assignRole('empleado');
    }
}
