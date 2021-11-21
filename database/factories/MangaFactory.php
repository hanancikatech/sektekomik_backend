<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title'  => $this->faker->firstNameFemale(), 
           'author' => $this->faker->firstName(),
           'description' => $this->faker->text(),
           'type' => 'Manga',
           'slug' =>  $this->faker->slug(),
        ];
    }
}
