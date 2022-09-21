<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buy>
 */
class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::orderByRaw("RAND()")->limit(5)->first(),
            'description'=> fake()->text(200),
            'module_id'=> Module::orderByRaw("RAND()")->limit(5)->first()
        ];
    }
}
