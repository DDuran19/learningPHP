<?php

namespace Database\Factories;

use App\Http\Helpers\FactoryHelper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->company(),
            "logo" => fake()->imageUrl(width: 92, height:92),
            "user_id" => FactoryHelper::getRandomIdOrCreate(User::class),
        ];
    }
}
