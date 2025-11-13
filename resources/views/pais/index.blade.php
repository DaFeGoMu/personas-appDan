@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Lista de Países</h1>
    <a href="{{ route('paises.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Nuevo País
    </a>
</div>

@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Código</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Capital</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($paises as $pais)
            <tr>
                <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $pais->pais_codi }}</td>
                <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $pais->pais_nomb }}</td>
                <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $pais->pais_capi }}</td>
                <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                    <a href="{{ route('paises.edit', $pais->pais_codi) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                    <form action="{{ route('paises.destroy', $pais->pais_codi) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este país?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-5 py-4 border-b border-gray-200 bg-white text-sm text-center">No hay países para mostrar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">
    {{ $paises->links() }}
</div>
@endsection