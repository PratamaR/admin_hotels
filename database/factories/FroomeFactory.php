<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FroomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "id" => rand(100000, 999999),
           "name" => $this->faker->name("female"),
           "description" => $this->faker->paragraph(5)
        ];
    }
}
