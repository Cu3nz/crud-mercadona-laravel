<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- todo los yields sirve para marcar lo que se va a modificar de la plantilla --}}

    <title>@yield('titulo')</title>
</head>

<body bgcolor="#000" text="#fff">

    {{-- ? Inicio de natvar --}}

    <nav class="bg-white border-gray-200 dark:bg-green-900">
        <div class="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
            <!-- Logo and Navigation Links Combined for all screen sizes -->
            <div class="flex items-center">
                <!-- Logo Image -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Logo_Mercadona_%28color-300-alpha%29.png" width="15%" alt="" class="ml-4 mt-1">
                <!-- Navigation Links visible on all screen sizes -->
                <a href="{{route('home')}}" class="py-2 px-3 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700 mr-4" aria-current="page">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{route('products.index')}}" class="py-2 px-3 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700 mr-4" aria-current="page">
                    <i class="fa-solid fa-utensils"></i></i> Productos
                </a>
                <a href="{{route('categories.index')}}" class="py-2 px-3 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fas fa-list mr-2"></i>Categorias
                </a>
                <a href="{{route('mail.pintar')}}" class="py-2 px-3 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fas fa-mail mr-2"></i>Contactanos
                </a>
            </div>
    
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" aria-expanded="false" aria-controls="mobile-menu">
                    <!-- Icon for mobile menu here -->
                </button>
            </div>
        </div>
    
        <!-- Mobile Menu -->
        <div class="md:hidden" id="mobile-menu">
            <ul class="flex flex-col mt-4">
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-4 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index')}}" class="block py-2 px-4 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-utensils"></i> Productos
                    </a>
                </li>
                <li>
                    <a href="{{route('categories.index')}}" class="block py-2 px-4 text-blue-500 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                        Categorias
                    </a>
                </li>
                <!-- Add more links for mobile menu here -->
            </ul>
        </div>
    </nav>
    

    <h1 class="mt-2 mb-2 text-center text-xl font-bold mt-4">@yield('cabecera')</h1>

    <div class="mx-auto w-3/4 p-8">
        @yield('contenido')
    </div>

    @if (session('mensaje'))
        
   <script>
     Swal.fire({
        icon: "success",
        title: "{{session('mensaje')}}",
        showConfirmButton: false,
        timer: 1500
      });
   </script>
    @endif

</body>

</html>
