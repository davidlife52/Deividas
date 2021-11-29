<x-layout>
    @include ('admin._header')
    <x-setting heading="Pridėti naują autobusą">
        <form method="POST" action="/admin/bus/create" enctype="multipart/form-data">
            @csrf

            <x-form.input name="busseats" text="Sėdimų vietų skaičius: " />
            <x-form.input name="license_plate" text="Valstybiniai numeriai: " />
            <x-form.textarea name="comment" text="Komentaras: " />

            <x-form.button>Išsaugoti</x-form.button>
        </form>

    </x-setting>
</x-layout>
