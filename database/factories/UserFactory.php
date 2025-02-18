<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'role' => 2
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
