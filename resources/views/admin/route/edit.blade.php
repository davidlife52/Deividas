<x-layout>
    @include ('admin._header')
    <x-setting :heading="'Modifikuoti reisą: '. $route->from .' - '. $route->to ">
        <form method="POST" action="/admin/routes/{{ $route->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="from" text="Išvyksta iš: " :value="old('from', $route->from)" />
            <x-form.input name="to" text="Atvyksta į: " :value="old('to', $route->to)" />
            <x-form.input name="price" text="Kaina: " :value="old('price', $route->price)" />
                @php
                    $arriveTime = \Carbon\Carbon::parse($route->arriveAt)->isoFormat('YYYY-MM-DD HH:mm');
                    $leaveTime = \Carbon\Carbon::parse($route->leaveAt)->isoFormat('YYYY-MM-DD HH:mm');
                @endphp
            <x-form.datetime name="leaveAt" text="Išvykimo laikas: " :value="old('leaveAt', $leaveTime)" />
            <x-form.datetime name="arriveAt" text="Atvykimo laikas: " :value="old('arriveAt', $arriveTime)" />

            <x-form.field>
                <x-form.label name="Autobusas" />

                <select name="bus_id" id="bus_id">
                    @foreach (\App\Models\Bus::all() as $bus)
                        <option
                            value="{{ $bus->id }}"
                            {{ old('bus_id', $route->bus_id) == $bus->id ? 'selected' : '' }}
                        >{{ ucwords($bus->license_plate) }}</option>
                    @endforeach
                </select>

                <x-form.error name="bus"/>
            </x-form.field>
            <x-form.button>Atnaujinti</x-form.button>
        </form>
    </x-setting>
</x-layout>
