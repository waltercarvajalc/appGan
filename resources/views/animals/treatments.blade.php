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

    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $animal->name }}'s Treatments</h1>
        <div class="flex flex-wrap -mx-2">
            @foreach($treatments as $treatment)
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl m-2 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <!--<img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="/docs/images/blog/image-4.jpg" alt="">-->
                <div class="flex flex-col justify-between p-4 leading-normal">
                    
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Detail:</strong> {{
                        $treatment->detail }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Description:</strong> {{
                        $treatment->description }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Medicines:</strong></p>
                    <ul class="list-disc list-inside">
                        @foreach($treatment->medicines as $medicine)
                        <li>{{ $medicine->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </a>

            @endforeach
        </div>
        <div class="mt-6">
            <a href="{{ route('animals.index') }}" class="text-blue-500 hover:underline">Back to Animals</a>
        </div>
    </div>

</x-app-layout>