<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Category::orderBy('id' , 'desc') -> paginate(5); //? Cojo todas las categorias ordenada por id de forma descendente y las ordeno de 5 en 5.
        return view('categorias.index' , compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create'); //todo En esta vista solo devolvemos la vista.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $request -> validate([

            'nombre' => ['required' , 'string' , 'min:3' , 'unique:categories,nombre'],
            'descripcion' => ['required' , 'string' , 'min:6']
        ]);


        Category::create([
            'nombre' => ucfirst($request -> nombre),
            'descripcion' => ucfirst($request -> descripcion)
        ]);


        return redirect() -> route('categories.index') -> with('mensaje' , 'Categoria' . $request -> nombre . ' creada correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('categorias.show' , compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('categorias.update' , compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //

        $request -> validate([

            'nombre' => ['required' , 'string' , 'min:3' , 'unique:categories,nombre,'.$category -> id], //? Para que no nos de error a la hora de actualizar y nos diga que el nombre esta repetido
            'descripcion' => ['required' , 'string' , 'min:6']
        ]);

        $category -> update([
            'nombre' => ucfirst($request -> nombre),
            'descripcion' => ucfirst($request -> descripcion)
        ]);

        return redirect() -> route('categories.index') -> with('mensaje' , 'Categoria actualizada correcatmente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        $category -> delete();

        return redirect() -> route('categories.index') -> with('mensaje' , 'Categoria ' . $category -> nombre . " eliminada correcatmente");

    }
}
