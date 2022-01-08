<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence(3);
        $description=$this->faker->realText();
        $year=$this->faker->year();
        $image='movies/placeholder.jpg';
       
        
        return [
            'title' => $title,
            'year' => $year,
            'image' => $image,
            'description' => $description,
        ];
    }
}
