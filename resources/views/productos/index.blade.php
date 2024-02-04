@extends('plantillas.plantilla')

@section('titulo')
    Productos
@endsection

@section('cabecera')
    Todos los productos
@endsection

@section('contenido')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-row-reverse mb-2">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('products.create')}}"><i class="fas fa-add mr-2"></i>Crear nuevo producto</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4">
                        <img src="{{Storage::url($item -> imagen)}}" class="w-16 md:w-32 max-w-full max-h-full"
                        alt="Apple Watch">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                     {{$item -> nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item -> descripcion}}
                    </td>
                    <td @class(["px-6 py-4",
                    "text-green-600" => $item -> precio >= 30,
                    "text-orange-600" => $item -> precio >= 20,
                    "text-red-600" => $item -> precio <= 9])>
                        {{$item -> precio}}€
                    </td>
                    <td @class([
                        "px-6 py-4",
                        "text-green-600" => $item-> stock >= 50 && $item-> stock <= 100,
                        "text-orange-600" => $item-> stock >= 30 && $item-> stock <= 49,
                        "text-red-600" => $item-> stock >= 1 && $item-> stock <= 29
                    ])>
                        {{$item->stock}}
                    </td>
                    <td class="px-6 py-4">  
                        {{$item -> category -> nombre}} {{-- todo Este category viene del nombre de la funcion en el  modelo de productos, mirar tambien porque pongo category_id  --}}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('products.destroy' , $item -> id)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('products.edit' , $item)}}"><i class="fas fa-edit text-yellow-600"></i></a>
                            <a href="{{route('products.show' , $item)}}"><i class="fas fa-info text-blue-600"></i></a>
                            <button type="submit"><i class="fas fa-trash text-red-600"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{$productos -> links()}}
    </div>

    @endsection
    