<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $fillable = ['nombre' , 'descripcion' , 'precio' , 'stock', 'imagen' , 'category_id'];

    public function category(){
        //todo Apunta a la 1, por lo tanto solo vamos a tener una categoria, por eso el nombre de la funcion es category.
        return $this->belongsTo(Category::class, 'category_id'); //? Este category_id lo estoy utilizando para poner en la tabla de productos la categoria
    }
}
