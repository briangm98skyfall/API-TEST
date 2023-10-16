<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'precio' => fake()->randomFloat(2,5,100),
            'stock' => fake()->randomDigit(),
            'categoria' => fake()->randomElement(['for girls','for boys','for babies','for home','for play']),
            'tags' => fake()->randomDigit(),
            'descripcion' => fake()->paragraph(),
            'infoAdicional' => fake()->sentence(),
            'valoracion' => fake()->sentence(),
            'sku' => fake()->randomNumber(),
            'url' => fake()->url()

        ];
    }
}
