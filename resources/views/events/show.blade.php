<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Show Event') }}
            </h2>
            <x-button target="" href="{{ route('events.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Events</span>
            </x-button>
        </div>
    </x-slot>


    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <div class="p-6 flex">
            <div class="w-2/3 pr-4">
                <h2 class="text-2xl font-bold mb-4">{{ $event->animal->name }}</h2>
                <p class="text-gray-700 mb-4"><strong>ID:</strong> {{ $event->id }}</p>
                <p class="text-gray-700 mb-4"><strong>Animal:</strong> {{ $event->animal->name }}</p>
                <p class="text-gray-700 mb-4"><strong>Event:</strong> {{ $event->eventType->name }}</p>
                <p class="text-gray-700 mb-4"><strong>Date:</strong> {{ $event->date }}</p>
                <p class="text-gray-700 mb-4"><strong>Description:</strong> {{ $event->description }}</p>
              
            </div>
            
        </div>
    </div>
</x-app-layout>