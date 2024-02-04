<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //todo Tenemos que tener un orden a la hora de crear los datos

        //* Primero tengo que crear las categorias, ya que si creo primero los productos me va a dar un error por la llave forenea que apunta a la tabla de categorias, por lo tanto: 
            //? 1. Creamos las categorias llamaando al seeder de categorias y ejecutando todos los metodos de la clase con (::class), esto ejecutara el unico metood que hay (run).
            //? 2. Borro la carpeta donde se almacenan las fotos de los productos
            //? 3. Creo la carpeta donde se van a almacnar las imagenes 
            //? 4. Llamo al factory que va a crear los productos.

            $this -> call(CategorySeeder::class); //* Esto llamara al sedder CategorySeeder.php y ejecutara el metodo run 
            Storage::deleteDirectory('products');
            Storage::createDirectory('products');
            Product::factory(50) -> create();



    }
}
