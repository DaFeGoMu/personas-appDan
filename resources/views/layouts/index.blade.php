<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Comunas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Comunas Registradas</h3>
                    <ul>
                        @foreach ($comunas as $comuna)
                            <li>{{ $comuna['id'] }} - {{ $comuna['nombre'] }}</li>
                        @endforeach
                    </ul>
                    @if (empty($comunas))
                        <p>No hay comunas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>