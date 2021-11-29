<x-layout>
    @include ('admin._header')
    <x-setting heading="Įvesti naują maršrutą">
        <form method="POST" action="/admin/route/create" enctype="multipart/form-data">
            @csrf

            <x-form.input name="from" text="Išvyksta iš: " />
            <x-form.input name="to" text="Atvyksta į: " />
            <x-form.input name="price" text="Kaina: " />
            <x-form.datetime name="leaveAt" text="Išvykimo laikas: " />
            <x-form.datetime name="arriveAt" text="Atvykimo laikas: " />

            <x-form.field>
                <x-form.label name="Autobusas" />

                <select name="bus_id" id="bus_id">
                    @foreach (\App\Models\Bus::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->license_plate) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Išsaugoti</x-form.button>
        </form>

    </x-setting>
</x-layout>
