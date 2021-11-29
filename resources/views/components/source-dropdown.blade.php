<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentSource) ? $currentSource->from: 'Išvykimo vieta' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="?{{ http_build_query(request()->except('from', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())"
    >
        ---------------
    </x-dropdown-item>
    @php
        $array = array();
    @endphp

    @foreach ($sources as $source)
    @php
            if(in_array($source->from, $array)){
                continue;
            }
            array_push($array, $source->from);
        @endphp
        <x-dropdown-item
            href="?from={{ $source->from }}&{{ http_build_query(request()->except('from', 'page')) }}"
            :active='request()->fullUrlIs("*?from={$source}*")'
        >
            {{ ucwords($source->from) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
