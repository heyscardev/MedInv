<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => strval(fake()->unique()->randomNumber(8, false)),
            'c_i' => strval(fake()->unique()->randomNumber(8, true)),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['FEMALE','MALE']),
            'email' => fake()->safeEmail(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> fake()->randomElement([fake()->address(),null])
        ];
    }
}
