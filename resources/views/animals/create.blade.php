<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Crear Animal') }}
            </h2>
            <x-button target="" href="{{ route('animals.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                  </svg>
                  
                <span>Animales</span>
            </x-button>
        </div>
    </x-slot>
    
    <div class="container mx-auto mt-10">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            
            
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
    
                <div class="mb-4">
                    <label for="birthdate" class="block text-gray-700 font-bold mb-2">Fecha de Nacimiento</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
    
                <div class="mb-4">
                    <label for="breed_id" class="block text-gray-700 font-bold mb-2">Raza</label>
                    <select name="breed_id" id="breed_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($breeds as $breed)
                            <option value="{{ $breed->id }}" {{ $breed->id == old('breed_id') ? 'selected' : '' }}>
                                {{ $breed->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="sex" class="block text-gray-700 font-bold mb-2">Sexo</label>
                    <input type="text" name="sex" id="sex" value="{{ old('sex') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
    
                <div class="mb-4">
                    <label for="father" class="block text-gray-700 font-bold mb-2">Padre</label>
                    <input type="text" name="father" id="father" value="{{ old('father') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
    
                <div class="mb-4">
                    <label for="mother" class="block text-gray-700 font-bold mb-2">Madre</label>
                    <input type="text" name="mother" id="mother" value="{{ old('mother') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
    
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Imagen</label>
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
    
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Crear
                    </button>
                    <a href="{{ route('animals.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
    
        

</x-app-layout>