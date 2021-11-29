<h1 class="text-center text-4xl"><span class="text-blue-500">Autobusų bilietų užsakymas</span> Deividas Simanavičius IFB-9</h1>
<header class="max-w-xl mx-auto mt-10 text-center">
    <h1 class="text-4xl">
        Naujausi <span class="text-blue-500">Autobusų</span> reisai
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-source-dropdown :sources=$routes :currentSource=$currentSource/>
        </div>
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-destination-dropdown :destinations=$routes :currentDestination=$currentDestination/>
        </div>
    </div>
</header>
