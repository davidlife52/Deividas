<!doctype html>

<title>Autobusų bilietų užsakymas</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div class="mt-8 md:mt-0 flex items-center">
            <a href="/"
                    class="text-xs font-bold uppercase {{ request()->is('/') ? 'text-blue-500' : '' }}">
                    Pradžia
                </a>
            @auth

            <x-dropdown>
                <x-slot name="trigger">
                    <button class="px-6 py-2 text-xs font-bold uppercase">
                        Sveiki, {{ auth()->user()->name }}!
                    </button>
                </x-slot>

                @if(Auth::user()->role == "0")
                    <x-dropdown-item
                        href="/tickets"
                        :active="request()->is('tickets')"
                    >
                        Bilietai
                    </x-dropdown-item>
                @endif

                @if(Auth::user()->role == "1")
                    <x-dropdown-item
                        href="/admin/buses"
                        :active="request()->is('admin/posts')"
                    >
                        Administratorius
                    </x-dropdown-item>
                @endif

                @if(Auth::user()->role == "2")
                    <x-dropdown-item
                        href="/business"
                        :active="request()->is('business')"
                    >
                        Vadybininkas
                    </x-dropdown-item>
                @endif

                <x-dropdown-item
                    href="#"
                    x-data="{}"
                    @click.prevent="document.querySelector('#logout-form').submit()"
                >
                    Atsijungti
                </x-dropdown-item>

                <form id="logout-form" method="POST" action="/logout" class="hidden">
                    @csrf
                </form>
            </x-dropdown>

            @else
                <a href="/register"
                   class="ml-6 text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                    Užsiregistruoti
                </a>

                <a href="/login"
                   class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                    Prisijungti
                </a>
            @endauth


        </div>
    </nav>

    {{ $slot }}


</section>
<x-flash/>
</body>
