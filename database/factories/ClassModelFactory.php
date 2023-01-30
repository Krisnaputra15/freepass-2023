<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClassModel;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ClassModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ClassModel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->asciify('**********'),
            'name' => $this->faker->catchPhrase(),
            'sks' => $this->faker->numberBetween(2, 5),
            'max_participant' => $this->faker->numberBetween(30, 40),
            'current_participant' => 0,
            'class_code' => $this->faker->regexify('[A-Za-z0-9]{7}'),
            'teacher_id' => User::all()->random()->identity_number
        ];
    }
}
