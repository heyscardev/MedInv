<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'n_history' => strval(fake()->unique()->randomNumber(8, false)),
            'c_i' => strval(fake()->unique()->randomNumber(8, true)),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Female','Male']),
            'email' => fake()->safeEmail(),
            'child' => fake()->boolean(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> fake()->randomElement([fake()->address(),null])
        ];
    }
}
