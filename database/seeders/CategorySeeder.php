<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $categorias = [
            'Frutas y Verduras' => 'Una variedad de frutas y verduras frescas y de temporada',
            'Carnes y Pescados' => 'Selección de carnes rojas, blancas y pescados variados',
            'Panadería y Pastelería' => 'Pan recién horneado y una amplia gama de productos de pastelería',
            'Lácteos y Huevos' => 'Productos lácteos esenciales y huevos de la mejor calidad',
            'Bebidas' => 'Bebidas refrescantes, jugos naturales y más',
            'Congelados' => 'Variedad de alimentos congelados para una comida rápida y fácil',
            'Alimentos Secos y Enlatados' => 'Amplia selección de alimentos secos, conservas y productos enlatados'
        ];


        foreach ($categorias as $nombre => $descripcion) {
            Category::create(compact('nombre' , 'descripcion'));
        }
        


    }
}
