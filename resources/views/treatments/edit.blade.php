<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Edit treatments') }}
            </h2>
            <x-button target="" href="{{ route('treatments.create') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Create treatment</span>
            </x-button>
        
                @if(session('success'))
                    <div class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded shadow-lg">
                        {{ session('success') }}
                    </div>
                @endif         
        </div>
    </x-slot>
<!--
    <h1>Edit Treatment</h1>
    <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="animal_id">Animal</label>
        <select name="animal_id" id="animal_id">
            @foreach($animals as $animal)
                <option value="{{ $animal->id }}" {{ $treatment->animal_id == $animal->id ? 'selected' : '' }}>
                    {{ $animal->name }}
                </option>
            @endforeach
        </select>

        <label for="date">Date</label>
        <input type="date" name="date" id="date" value="{{ $treatment->date }}" required>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $treatment->description }}" required>

        <label for="medicine_ids">Medicines</label>
        <select name="medicine_ids[]" id="medicine_ids" multiple>
            @foreach($medicines as $medicine)
                <option value="{{ $medicine->id }}" {{ in_array($medicine->id, $selectedMedicines) ? 'selected' : '' }}>
                    {{ $medicine->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
-->

<div class="container mx-auto mt-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">{{ $treatment->animal->name }}'s Treatment Edit</h1>
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('treatments.update', $treatment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')
            
            <div class="mb-4">
                <label for="animal_id" class="block text-gray-700 font-bold mb-2">Animal</label>
                <select name="animal_id" id="animal_id">
                    @foreach($animals as $animal)
                        <option value="{{ $animal->id }}" {{ $treatment->animal_id == $animal->id ? 'selected' : '' }}>
                            {{ $animal->name }}
                         </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date', $treatment->date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="detail" class="block text-gray-700 font-bold mb-2">Detalle</label>
                <input type="text" name="detail" id="detail" value="{{ old('detail', $treatment->detail) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción</label>
                <textarea rows="4" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{$treatment->description}}</textarea>
                <input type="text" name="description" id="description" value="{{ old('description', $treatment->description) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="medicine_ids" class="block text-gray-700 font-bold mb-2">Medicines</label>
                <select name="medicine_ids[]" id="medicine_ids" multiple>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}" {{ in_array($medicine->id, $selectedMedicines) ? 'selected' : '' }}>
                            {{ $medicine->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar
                </button>
                <a href="{{ route('treatments.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>
    

</x-app-layout>