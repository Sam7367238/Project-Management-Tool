<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Symfony\Component\Clock\now;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake() -> sentence(3),
            "description" => fake() -> paragraph(),
            "finish_date" => fake() -> date(),
            "is_finished" => fake() -> boolean(),
            "user_id" => User::factory()
        ];
    }
}
