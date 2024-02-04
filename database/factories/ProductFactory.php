<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            
            //
            'nombre' => fake() -> words(3,true),
            'descripcion' => fake() -> text(),
            'precio' => fake() -> randomFloat(2 , 1 , 30) ,
            'stock' => random_int(1,100),
            //? Estamos guardando la imagen en la base de datos como products/kgkjfjkgjkfgdlf_13343.jpg
            //? Ahora lo que esta entre "", es donde se van a almacenar las imagenes en este caso public/storage/products
            'imagen' => 'products/'.fake()->picsum("public/storage/products", 640, 400, false),
            'category_id' => Category::all() -> random() -> id
        ];
    }
}
