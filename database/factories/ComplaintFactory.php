<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'complain_type' => $this->faker->randomElement(['type1', 'type2', 'type3']),
            // 'department_id' => Department::
            // 'subdepartment_id' => Subdepartment::factory(), 
            'complaint_short_description' => $this->faker->sentence,
            'complaint_description' => $this->faker->paragraph,
            'status' => $this->faker->boolean,
            'user_id' => User::query()->inRandomOrder()->value('id'),

        ];
    }
}
