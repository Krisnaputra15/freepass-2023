<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition()
    {
        return [
            'identity_number' => fake()->numberBetween(195150000000000, 235150201111043),
            'fullname' => fake()->name(),
            'major' => fake()->title(), 
            'faculty' => fake()->catchPhrase(),
            'education_level' => fake()->title(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('fullclip'), // password 
            'role' => fake()->numberBetween(1,2)
        ];
    }
}
