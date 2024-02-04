@extends('plantillas.plantilla')

@section('titulo')
    Actualizacion de categoria
@endsection

@section('cabecera')
   Actualizando categoria <strong><u>{{$category -> nombre}}</u></strong>
@endsection

@section('contenido')
    <div class="w-3/4 mx-auto p-6 rounded-xl shadow-xl bg-gray-600 dark:text-gray-200">
        <form method="POST" action="{{route('categories.update' , $category -> id)}}">
            @csrf
            @method('put')
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" value="{{old('nombre' , $category -> nombre)}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="nombre de la categoria" name="nombre">
                    @error('nombre')
                    <x-inputserror>
                        {{$message}}
                    </x-inputserror>
                    @enderror                           
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <textarea id="descripcion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="descripcion" placeholder="Introduce el contenido de la categoria" rows="10">{{old('descripcion' , $category -> descripcion)}}</textarea>
                    @error('descripcion')
                        <x-inputserror>
                            {{$message}}
                        </x-inputserror>
                    @enderror                    
            </div>


            <div class="flex flex-row-reverse">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-save"></i> GUARDAR
                </button>
                
                <a href="{{route('categories.index')}}" class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</a>
            </div>
        </form>
    </div>
@endsection
