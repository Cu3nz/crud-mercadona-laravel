@extends('plantillas.plantilla')

@section('titulo')
    Nueva Categoria
@endsection

@section('cabecera')
    Informacion de la categoria <strong><u>{{$category -> nombre}}</u></strong>
@endsection

@section('contenido')




<div class="max-w-sm mx-auto mt-30 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="https://findlogovector.com/wp-content/uploads/2018/12/mercadona-supermercados-de-confianza-logo-vector.png" alt="" />
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <strong>Nombre de categoria: </strong>{{$category -> nombre}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Descripcion: </strong> {{$category -> descripcion}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Creacion: </strong> {{$category -> created_at -> format('d/m/Y H:i:s')}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Ultima actualización: </strong> {{$category -> updated_at -> format('d/m/Y H:i:s')}}</p>
        <a href="{{route('categories.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fas fa-home text-white-600 mr-2"></i>Volver a Home
        </a>
    </div>
</div>



@endsection