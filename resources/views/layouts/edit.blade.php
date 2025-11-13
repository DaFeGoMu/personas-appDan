@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Editar País</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paises.update', $pais->pais_codi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
            <input type="text" id="code" name="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-200" value="{{ $pais->pais_codi }}" readonly>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ $pais->pais_nomb }}">
        </div>

        <div class="mb-6">
            <label for="capital" class="block text-gray-700 text-sm font-bold mb-2">Capital (código numérico):</label>
            <input type="number" id="capital" name="capital" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ $pais->pais_capi }}">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
            <a href="{{ route('paises.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancelar</a>
        </div>
    </form>
</div>
@endsection