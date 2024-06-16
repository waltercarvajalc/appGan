<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Animales"
        :active="Str::startsWith(request()->route()->uri(), 'animals')"
    >
        <x-slot name="icon">
            <x-icons.animals class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Lista"
            href="{{ route('animals.index') }}"
            :active="request()->routeIs('animals.index')"
        />
        <x-sidebar.sublink
            title="Razas"
            href="{{ route('breeds.index') }}"
            :active="request()->routeIs('breeds.index')"
        />
        
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Eventos"
        :active="Str::startsWith(request()->route()->uri(), 'events')"
    >
        <x-slot name="icon">
            <x-icons.events class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Lista"
            href="{{ route('events.index') }}"
            :active="request()->routeIs('events.index')"
        />
        <x-sidebar.sublink
            title="Tipos de evento"
            href="{{ route('event_types.index') }}"
            :active="request()->routeIs('event_types.index')"
        />
        
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Tratamientos"
        :active="Str::startsWith(request()->route()->uri(), 'treatments')"
    >
        <x-slot name="icon">
            <x-icons.treatments class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Lista"
            href="{{ route('treatments.index') }}"
            :active="request()->routeIs('treatments.index')"
        />
        <x-sidebar.sublink
            title="Medicamentos"
            href="{{ route('medicines.index') }}"
            :active="request()->routeIs('medicines.index')"
        />
        
    </x-sidebar.dropdown>

</x-perfect-scrollbar>
