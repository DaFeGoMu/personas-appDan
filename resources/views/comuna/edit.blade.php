@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Editar Comuna</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comunas.update', $comuna->comu_codi) }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
            <input type="text" id="code" name="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-200" value="{{ $comuna->comu_codi }}" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ $comuna->comu_nomb }}">
        </div>

        <label for="municipality" class="block text-gray-700 text-sm font-bold mb-2">Municipio:</label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="municipality" name="muni_codi" required>
            <option disabled value="">Elige uno...</option>
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->muni_codi }}" @if($municipio->muni_codi == $comuna->muni_codi) selected @endif>{{ $municipio->muni_nomb }}</option>
            @endforeach
        </select>
        <div class="mt-3">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
            <a href="{{ route('comunas.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancelar</a>
        </div>
    </form>
</div>
@endsection