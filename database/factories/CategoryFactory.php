<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //ao adicionar a propriedade unique, os nomes das categorias não se repetem
        //criando nomes falsos com o faker
        $name =  $this->faker->unique()->word(20);
        return [
           'name' => $name,
           'slug' => Str::slug($name)
        ];
    }
}
