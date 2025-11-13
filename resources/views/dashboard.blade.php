@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold mb-4">¡Bienvenido a PersonasApp!</h1>
    <p class="text-lg text-gray-600 mb-8">Selecciona una opción para comenzar a gestionar los datos.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card Países -->
        <a href="{{ route('paises.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h2 class="text-2xl font-bold mb-2">Gestionar Países</h2>
            <p class="text-gray-600">Ver, crear, editar y eliminar países.</p>
        </a>

        <!-- Card Departamentos -->
        <a href="{{ route('departamentos.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h2 class="text-2xl font-bold mb-2">Gestionar Departamentos</h2>
            <p class="text-gray-600">Administra los departamentos de cada país.</p>
        </a>

        <!-- Card Comunas -->
        <a href="{{ route('comunas.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h2 class="text-2xl font-bold mb-2">Gestionar Comunas</h2>
            <p class="text-gray-600">Administra las comunas de cada municipio.</p>
        </a>
    </div>
</div>
@endsection