<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Registracija!</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name" text="Vardas"  />
                    <x-form.input name="surname" text="Pavardė"  />
                    <x-form.input name="email" text="El.Paštas" autocomplete="username"  />
                    <x-form.input name="password" text="Slaptažodis" type="password" autocomplete="new-password"  />
                    <x-form.button>Užsiregistruoti</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
