<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $fillable = ['nombre','descripcion'];

    public function products (){
        //todo Apunta a la N , vamos a tener muchos productos, por lo tanto el nombre de la funcion sera products en plural y utilizamos el hasMany
       return $this -> hasMany(Product::class);
    }


}
