<x-layout>
    @include ('business._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($routes->count())
            <x-business-grid :routes="$routes" />
        @else
            <p class="text-center">Maršrutų dar nėra.</p>
        @endif
    </main>
</x-layout>
