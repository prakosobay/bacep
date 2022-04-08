<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visit' => $this->faker->date(),
            'leave' => $this->faker->date(),
            'name-req' => $this->faker->name,
            'dept-req' => $this->faker->name,
            'phone-req' => $this->faker->phoneNumber(),
            'pic' => [
                [
                    'name' => $this->faker->name,
                    'nik' => [rand(16,3)],
                    'phone' => $this->faker->phoneNumber(),
                    'company' => $this->faker->company(),
                    'dept' => $this->faker->name,
                ],
                [
                    'name' => $this->faker->name,
                    'nik' => [rand(16,3)],
                    'phone' => $this->faker->phoneNumber(),
                    'company' => $this->faker->company(),
                    'dept' => $this->faker->name,
                ],
                [
                    'name' => $this->faker->name,
                    'nik' => [rand(16,3)],
                    'phone' => $this->faker->phoneNumber(),
                    'company' => $this->faker->company(),
                    'dept' => $this->faker->name,
                ],
                [
                    'name' => $this->faker->name,
                    'nik' => [rand(16,3)],
                    'phone' => $this->faker->phoneNumber(),
                    'company' => $this->faker->company(),
                    'dept' => $this->faker->name,
                ],
                [
                    'name' => $this->faker->name,
                    'nik' => [rand(16,3)],
                    'phone' => $this->faker->phoneNumber(),
                    'company' => $this->faker->company(),
                    'dept' => $this->faker->name,
                ],
            ],
        ];
    }
}
