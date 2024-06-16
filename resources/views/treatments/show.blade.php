<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Treatment Details') }}
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
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <!--<div class="absolute inset-0 bg-gradient-to-r from-teal-300 to-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>-->
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $treatment->animal->name }}'s Treatment Details</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex items-center space-x-3">
                                <span class="text-teal-500">
                                    -
                                </span>
                                <span class="text-gray-900 font-medium">Date:</span>
                            </div>
                            <p class="text-gray-600">{{ $treatment->date }}</p>

                            <div class="flex items-center space-x-3">
                                <span class="text-teal-500">
                                    -
                                </span>
                                <span class="text-gray-900 font-medium">Detail:</span>
                            </div>
                            <p class="text-gray-600">{{ $treatment->detail }}</p>
                            
                            <div class="flex items-center space-x-3">
                                <span class="text-teal-500">
                                    -
                                </span>
                                <span class="text-gray-900 font-medium">Description:</span>
                            </div>
                            <p class="text-gray-600">{{ $treatment->description }}</p>
                            
                            <div class="flex items-center space-x-3">
                                <span class="text-teal-500">
                                    -
                                </span>
                                <span class="text-gray-900 font-medium">Medicines:</span>
                            </div>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach($treatment->medicines as $medicine)
                                    <li>{{ $medicine->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                            <a href="{{ route('treatments.edit', $treatment->id) }}" class="text-teal-600 hover:text-teal-700">Edit Treatment &rarr;</a>
                            <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">Delete Treatment &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--
<h1>Treatment Details</h1>
    <p>Animal: {{ $treatment->animal->name }}</p>
    <p>Date: {{ $treatment->date }}</p>
    <p>Detail: {{ $treatment->detail }}</p>
    <p>Description: {{ $treatment->description }}</p>
    <p>Medicines:</p>
    <ul>
        @foreach($treatment->medicines as $medicine)
            <li>{{ $medicine->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('treatments.edit', $treatment->id) }}">Edit</a>
    <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('treatments.index') }}">List</a>

-->
</x-app-layout>