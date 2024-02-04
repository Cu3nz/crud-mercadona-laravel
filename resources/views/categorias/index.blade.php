@extends('plantillas.plantilla')

@section('titulo')

Categorias de mercadona

@endsection

@section('cabecera')

Todas las categorias

@endsection

@section('contenido')



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-row-reverse mb-2">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('categories.create')}}"><i class="fas fa-add mr-2"></i>Crear nueva categoria</a>
    </div>
    <table class="w-full text-sm text-center rtl:text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                   Acciones
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categorias as $item)
                
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item -> nombre}}
                </th>
                <td class="px-6 py-4">
                    {{$item -> descripcion }}
                </td>
                <td class="px-6 py-4 text-right">
                    <form action="{{route('categories.destroy' , $item -> id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('categories.edit' , $item)}}"><i class="fas fa-edit text-yellow-600 mr-1"></i></a>
                        <a href="{{route('categories.show' , $item)}}"><i class="fas fa-info text-blue-600 mr-2"></i></a>
                        <button type="submit"><i class="fas fa-trash text-red-600"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{$categorias -> links()}}
</div>


@endsection
