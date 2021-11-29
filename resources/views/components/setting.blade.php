@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Nuorodos</h4>

            <ul>
                <li>
                    <a href="/admin/buses" class="{{ request()->is('admin/buses') ? 'text-blue-500' : '' }}">Visi autobusai</a>
                </li>
                <li>
                    <a href="/admin/bus/create" class="{{ request()->is('admin/bus/create') ? 'text-blue-500' : '' }}">Naujas autobusas</a>
                </li>
                <li>
                    <a href="/admin/routes" class="{{ request()->is('admin/routes') ? 'text-blue-500' : '' }}">Visi reisai</a>
                </li>

                <li>
                    <a href="/admin/route/create" class="{{ request()->is('admin/route/create') ? 'text-blue-500' : '' }}">Naujas reisas</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
