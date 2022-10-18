<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'author_id' => rand(1, 5),
            'summary' => $this->faker->paragraph,
            'price' => rand(2000, 10000),
            'category_id' => rand(1, 6)
        ];
    }
}