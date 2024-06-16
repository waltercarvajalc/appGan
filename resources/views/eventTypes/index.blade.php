<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('List Event Types') }}
            </h2>
            <x-button target="" href="{{ route('event_types.create') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.create class="w-6 h-6" aria-hidden="true" />
                <span>Create Event Type</span>
            </x-button>
        
                @if(session('success'))
                    <div class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded shadow-lg">
                        {{ session('success') }}
                    </div>
                @endif
        
                
            
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded my-6 p-6">
            @if(session('success'))
            <div id="notification" class="bg-blue-400 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th
                            class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nombre</th>
                        <th
                            class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Descripción</th>
                        
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($eventTypes as $eventType)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $eventType->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $eventType->description}}</td>
                        
                        <!--
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('event_types.show', $eventType->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </td>
                        -->

                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('event_types.edit', $eventType->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2                                                       2 0 112.828                                                                 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <form action="{{ route('event_types.destroy', $eventType->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this breed?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </button>
                            </form>
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>


    </div>
</x-app-layout>