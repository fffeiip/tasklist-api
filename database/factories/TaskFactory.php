<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        if(!User::count()) {
            User::factory()->count(10)->create();
        }
        $user = User::inRandomOrder()->first();
        return [
            'title' => ucwords(fake()->words(rand(2,4), true)),
            'description' => fake()->text(),
            'user_id' => $user->id
        ];
    }
}
