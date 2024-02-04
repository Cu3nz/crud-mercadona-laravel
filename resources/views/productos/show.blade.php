@extends('plantillas.plantilla')

@section('titulo')
    Informacion de producto
@endsection

@section('cabecera')
    Información del producto <u>{{ $product->nombre }}</u> <i class="fas fa-box"></i>
@endsection

@section('contenido')
    <div class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg w-full" src="{{Storage::url($product->imagen)}}" alt="Imagen del producto" />

        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->nombre}}</h5>
            </a>
            <p class="mb-3 text-black-600 font-normal dark:text-black-600"><i class="fas fa-file-alt"></i> Descripcion: {{$product->descripcion}}</p>
            <p class="mb-3 text-black-600 font-normal dark:text-black-600"><i class="fas fa-dollar-sign"></i> Precio: {{$product->precio}}€</p>
            <p class="mb-3 text-black-600 font-normal dark:text-black-600"><i class="fas fa-cubes"></i> Stock: <span @class([
                "text-green-600" => $product->stock >= 30 && $product->stock <= 100,
                "text-red-600" => $product->stock >= 1 && $product->stock <= 29
            ]) >{{$product->stock}} Unidades</span></p>

            <p class="mb-3 text-black-600 font-normal dark:text-black-600"><i class="far fa-clock"></i> Creación del producto: <b>{{$product->created_at->format('d/m/Y h:i:s')}}</b></p>
            <p class="mb-3 text-black-600 font-normal dark:text-black-600"><i class="far fa-clock"></i> Última actualización del producto: <b>{{$product->created_at->format('d/m/Y h:i:s')}}</b></p>

            <a href="{{route('products.index')}}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fas fa-home text-white mr-2"></i> Ir a productos 
            </a>
        </div>
    </div>
@endsection
