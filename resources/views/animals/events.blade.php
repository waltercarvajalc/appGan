<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Show animal') }}
            </h2>
            <x-button target="" href="{{ route('animals.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Animals</span>
            </x-button>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded my-6 p-6">

            @if(session('success'))
            <div id="notification" class="bg-blue-400 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

        <h1 class="text-2xl font-semibold mb-4">Events for {{ $animal->name }}</h1>
        @if($events->isEmpty())
        <p>No events found for this animal.</p>
        @else
        <table class="min-w-full bg-white">
            <thead>
                <tr>

                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Event Type</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($events as $event)
                <tr>

                    <td class="py-2 px-4 border-b border-gray-200">{{ $event->eventType->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $event->date }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $event->description }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        </div>
    </div>

</x-app-layout>