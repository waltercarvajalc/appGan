<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Ver Animal') }}
            </h2>
            <x-button target="" href="{{ route('animals.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Animales</span>
            </x-button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="p-6 flex">
            <div class="w-2/3 pr-4">
                <h2 class="text-2xl font-bold mb-4">{{ $animal->name }}</h2>
                <p class="text-gray-700 mb-4"><strong>ID:</strong> {{ $animal->id }}</p>
                <p class="text-gray-700 mb-4"><strong>Nombre:</strong> {{ $animal->name }}</p>
                <p class="text-gray-700 mb-4"><strong>Birthdate:</strong> {{ $animal->birthdate }}</p>
                <p class="text-gray-700 mb-4"><strong>Raza:</strong> {{ $animal->breed->name }}</p>
                            
                <a href="{{ route('animals.treatments', $animal->id) }}">
                    <p class="text-green-700 mb-4"><strong>{{ $animal->name }}'s Treatment &rarr;</strong></p>              
                </a>
                
                <a href="{{ route('animals.events', $animal->id) }}">
                    <p class="text-green-700 mb-4"><strong>{{ $animal->name }}'s Events &rarr;</strong></p>
                </a>
            </div>
            <div class="w-1/2">
                <img src="/storage/{{ $animal->image }}" alt="{{ $animal->name }}" class="img-fluid max-w-full h-auto rounded">
            </div>
            
        </div>
        <div class="flex space-x-4 m-10">
                
            <a href="{{ route('animals.edit', $animal->id) }}">
                <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-green-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar</button>              
            </a>
            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este animal?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-red-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" 
                onclick="return confirm('Are you sure you want to delete this animal?')">
                    Eliminar
                </button>
            </form>
            <a href="{{ route('animals.index') }}">
                <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-yellow-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver a la lista</button>              
            </a>
        </div>
    </div>
</x-app-layout>