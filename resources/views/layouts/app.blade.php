<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a class="text-xl font-bold text-gray-800" href="{{ route('dashboard') }}">PersonasApp</a>
            <div class="flex space-x-4">
                <!-- Menú Países -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-gray-800 hover:text-blue-500">Países</button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('paises.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Listar Países</a>
                        <a href="{{ route('paises.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nuevo País</a>
                    </div>
                </div>
                <!-- Menú Departamentos -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-gray-800 hover:text-blue-500">Departamentos</button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('departamentos.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Listar Departamentos</a>
                        <a href="{{ route('departamentos.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nuevo Departamento</a>
                    </div>
                </div>
                <!-- Menú Comunas -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-gray-800 hover:text-blue-500">Comunas</button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('comunas.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Listar Comunas</a>
                        <a href="{{ route('comunas.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nueva Comuna</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>
</body>
</html>