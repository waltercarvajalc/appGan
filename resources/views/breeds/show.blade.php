<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Show breed') }}
            </h2>
            <x-button target="" href="{{ route('breeds.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Breeds</span>
            </x-button>
        </div>
    </x-slot>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">{{ $breed->name }}</h2>
            <p class="text-gray-700 mb-4"><strong>ID:</strong> {{ $breed->id }}</p>
            <p class="text-gray-700 mb-4"><strong>Nombre:</strong> {{ $breed->name }}</p>
            <p class="text-gray-700 mb-4"><strong>Descripcion:</strong> {{ $breed->description }}</p>
            <!-- Puedes agregar más campos según los atributos de la raza -->
            
            <div class="flex space-x-4">
                
                <a href="{{ route('breeds.edit', $breed->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <form action="{{ route('breeds.destroy', $breed->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta raza?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Eliminar
                    </button>
                </form>
                <a href="{{ route('breeds.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Volver a la lista
                </a>
            </div>
        
        </div>
    </div>
</x-app-layout>