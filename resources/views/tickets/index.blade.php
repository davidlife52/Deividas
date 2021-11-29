<x-layout>
    @include ('tickets._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($routes->count())
            <x-custom-routes-grid :routes="$routes"/>

            {{ $routes->links() }}
        @else
            <p class="text-center">Bilietų nėra.</p>
        @endif
    </main>
</x-layout>
