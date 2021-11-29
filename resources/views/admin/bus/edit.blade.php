<x-layout>
    @include ('admin._header')
    <x-setting :heading="'Modifikuoti autobusą: ' . $bus->license_plate">
        <form method="POST" action="/admin/buses/{{ $bus->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            {{-- <x-form.input name="busseats" text="Sėdimų vietų skaičius" :value="old('busseats', $bus->busseats)" /> --}}
            <x-form.input name="license_plate" text="Valstybiniai numeriai" :value="old('license_plate', $bus->license_plate)" />

            <x-form.textarea name="comment" text="Komentaras">{{ old('comment', $bus->comment) }}</x-form.textarea>

            <x-form.button>Atnaujinti</x-form.button>
        </form>
    </x-setting>
</x-layout>
