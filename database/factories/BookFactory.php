<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'author' => $this->faker->name,
            'summary' => $this->faker->paragraph,
            'price' => rand(2, 10),
            'category_id' => rand(1, 6)
        ];
    }
}