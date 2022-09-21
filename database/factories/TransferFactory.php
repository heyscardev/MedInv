<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $send = Module::orderByRaw("RAND()")->limit(5)->first();
        $received = Module::orderByRaw("RAND()")->limit(5)->first();
        return [
            'module_send_id'=>$send,
            'module_receive_id'=>$received,
            'user_id'=> $send->user,
            'description'=>fake()->text(200)
        ];
    }
}
