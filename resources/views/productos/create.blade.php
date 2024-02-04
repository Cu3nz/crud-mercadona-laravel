@extends('plantillas.plantilla')

@section('titulo')
    Crear producto
@endsection

@section('cabecera')
    Crear un nuevo producto
@endsection

@section('contenido')
    <div class="w-3/4 mx-auto p-6 rounded-xl shadow-xl bg-gray-600 dark:text-gray-200">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="nombre..." name="nombre" value="{{old('nombre')}}">
                @error('nombre')
                    <x-inputserror>
                            {{$message}}
                    </x-inputserror>
                @enderror
            </div>

            <div class="mb-5">
                <label for="descripcion"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <textarea type="text" id="descripcion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="descripcion..." name="descripcion">{{old('descripcion')}}</textarea>

                    @error('descripcion')
                    <x-inputserror>
                        {{$message}}
                    </x-inputserror>
                @enderror
               
            </div>

            <div class="mb-5">
                <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="number" value="{{old('precio')}}"   id="precio" step="0.01" placeholder="Ingrese el precio (hasta 2 decimales)"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="precio">
            </div>
            @error('precio')
                <x-inputserror>
                    {{ $message }}
                </x-inputserror>
            @enderror
            <div class="mb-5">
                <label for="stock"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                <input type="number" value="{{old('stock')}}" id="stock" step="0.01" placeholder="Cantidad de stock"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="stock">
            </div>
            @error('stock')
                <x-inputserror>
                    {{ $message }}
                </x-inputserror>
            @enderror
            <div class="mb-5">
                <label for="categoria"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                <select name="category_id" id="categoria"
                    class=" text-xl bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">------------------- Selecciona una -----------------------------</option>
                    @foreach ($categoria as $item)
                    {{-- * el selected lo que hace es guardar el valor de category_id si hay una id seleccionada --}}
                        <option value="{{ $item -> id }}" @selected(old('category_id') == $item -> id)>{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <x-inputserror>
                    {{ $message }}
                </x-inputserror>
            @enderror
            <div class="mb-4">
                <div class="flex w-full">
                    <div class="w-1/2 mr-2">
                        <label for="imagen"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen</label>
                        <input type="file" value="{{old('precio')}}" id="imagen" oninput="img.src=window.URL.createObjectURL(this.files[0])"
                            name="imagen" accept="image/*"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    @error('imagen')
                        {{-- ! Para los errores --}}
                        <x-inputserror>
                            {{ $message }}
                        </x-inputserror>
                    @enderror
                    <div class="w-1/2">
                        <img src="{{Storage::url("noimage.png")}}"
                            class="h-72 rounded w-full bg-cover bg-center bg-no-repeat border-4 border-black"
                            id="img">
                    </div>
                </div>


                <div class="flex flex-row-reverse mt-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-save"></i> GUARDAR
                    </button>
                    <button type="reset"
                        class="mx-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-paintbrush"></i> LIMPIAR
                    </button>
                    <a href="{{(route('products.index'))}}" class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-xmark"></i> CANCELAR</a>
                </div>
        </form>
    </div>
@endsection
