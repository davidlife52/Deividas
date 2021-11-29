<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentDestination) ? $currentDestination->to: 'Atvykimo vieta' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="?{{ http_build_query(request()->except('to', 'page')) }}"
        :active="request()->routeIs('to') && is_null(request()->getQueryString())"
    >
        ---------------
    </x-dropdown-item>
    @php
        $array = array();
    @endphp

    @foreach ($destinations as $destination)
        @php
            if(in_array($destination->to, $array)){
                continue;
            }
            array_push($array, $destination->to);
        @endphp
        <x-dropdown-item
            href="?to={{ $destination->to }}&{{ http_build_query(request()->except('to', 'page')) }}"
            :active='request()->fullUrlIs("*?to={$destination}*")'
        >
            {{ ucwords($destination->to) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
