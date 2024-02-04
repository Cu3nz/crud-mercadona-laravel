<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Product::with('category') // Carga previamente la relación 'category' para cada producto, por lo tanto nos podemos traer el nombre de la categoria
        ->orderBy('id', 'desc') // Ordena los productos por su ID en orden descendente
        ->paginate(5); // Pagina los resultados, mostrando 5 productos por página
        return view('productos.index' , compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categoria = Category::select('id' , 'nombre') -> orderBy('nombre') -> get(); //? Cogemos el id y el nombre de la tabla categories basicamente 
        return view('productos.create' , compact('categoria'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request -> validate([

            'nombre' => ['required' , 'string' , 'min:4' , 'unique:products,nombre'],
            'descripcion' => ['required' , 'string' , 'min:3'],
            'precio' => ['required' , 'integer' , 'min:1' , 'max:100'],
            'stock' => ['required' , 'integer' , 'min:1' , 'max:100'],
            'category_id' => ['required' , 'exists:categories,id'], //? Este category_id viene del name del select
            'imagen' => ['nullable' , 'image' , 'max:2048']
        ]);

        //todo Una vez que pasamos las validaciones creamos el producto

        //? Esto es para crear el producto con una imagen, tenemos que hacer una comprobacion 

        //* Si existe $request -> imagen es porque hemos hecho click en el boton y hemos subido una imagen , si no automaticamente ponemos la imagen por default (: "noimage.png)

        //* Si hemos subido una imagen, esa imagen se tiene que almacenar en la carpeta 'products', por lo tanto el metodo store  lo que hace es almacenar la imagen que esta en $request -> imagen en la carpeta 'products' y devolver la ruta de la imagen por ejemplo products/ketchup.jpg


        $ruta = ($request -> imagen) ? $request -> imagen -> store('products') : "noimage.png";


        Product::create([

            'nombre' => ucfirst($request -> nombre),
            'descripcion' => ucfirst($request -> descripcion),
            'precio' => (int) (($request -> precio)),
            'stock' => (int) (($request -> stock)),
            'category_id' => $request -> category_id,
            'imagen' => $ruta
        ]);

        /* dd($ruta); */

        return redirect() -> route('products.index') -> with('mensaje' , 'Producto creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('productos.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categoria = Category::select('id' , 'nombre') -> orderBy('nombre') -> get(); //? Cogemos el id y el nombre de la tabla categories basicamente 
        return view('productos.update' , compact('product' , 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //


        $request -> validate([

            'nombre' => ['required' , 'string' , 'min:4' , 'unique:products,nombre,'. $product -> id], //? Para que no nos de fallo a la hora de actualizar, no nos diga el error de que ya existe el nombre en la base de datos
            'descripcion' => ['required' , 'string' , 'min:3'],
            'precio' => ['required' , 'integer' , 'min:1' , 'max:100'],
            'stock' => ['required' , 'integer' , 'min:1' , 'max:100'],
            'category_id' => ['required' , 'exists:categories,id'], //? Este category_id viene del name del select
            'imagen' => ['nullable' , 'image' , 'max:2048']
        ]);

        //todo Una vez pasadas las validaciones, tenemos que comprobar la dichosa imagen, ya que si actualizamos la imagen, tenemos que borrar la anterior que tenia el producto, pero si es la default no la podemos borrar por lo tanto hacemos el siguiente codigo 

        $imagen = $product -> imagen; //? Almacenamos en $imagen la imagen que tiene actualmente el producto, basicamente la imagen que se le ha puesto en el create. 

        //todo Ahora hacemos la comprobacion, de que si se ha subido una imagen y es distinta a la default, teenemos que borrarla de la carpeta 'products', si no , se deja la imagen por defecto.

        if ($request -> imagen){ //* Si se ha subido una imagen
                //? Comprobamos el nombre de la imagen que tiene actualmente el producto
            if (basename($imagen) != "noimage.png"){ //* Si el nombre de la imagen es distinta a la default
                Storage::delete($product -> imagen); //* Borramos la imagen que tiene actualmente ese producto (la que se ha definido en el create)
            }

            //* Ahora imagen, vale la nueva imagen que se ha subido 
    
            $imagen = $request -> imagen -> store('products');
        }


        $product -> update([
            'nombre' => ucfirst($request -> nombre),
            'descripcion' => ucfirst($request -> descripcion),
            'precio' => (int) (($request -> precio)),
            'stock' => (int) (($request -> stock)),
            'category_id' => $request -> category_id,
            'imagen' => $imagen
        ]);

        return redirect() -> route('products.index') -> with('mensaje' , 'producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        //todo Antes de borrar la foto, tengo que comprobar que si es la default que no la borre, ahora si es distinta que la borre de la carpeta

        if (basename($product -> imagen) != "noimage.png"){ //? Si la el nombre de la imagen es distinta a noimage.png
            Storage::delete($product -> imagen); //? Borramos la imagen que tiene ese producto de la carpeta de products 
        }

        //todo Una vez borrada la foto, borramos el producto.

        $product -> delete();


        return redirect() -> route('products.index') -> with('mensaje' , "Producto eliminado correctamente");
    }
}
