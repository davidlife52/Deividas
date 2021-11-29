@props(['routes'])

@foreach ($routes as $route)
    <article
        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="py-6 px-5 lg:flex">

            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <div class="mt-4">
                        <h1 class="text-3xl">
                            {{ $route->from }} - {{ $route->to }}
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Išvyksta: <time>{{ $route->leaveAt }}</time>
                            Atvyksta: <time>{{ $route->arriveAt }}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm mt-2 space-y-4">
                    Laisvų vietų: {{ $route->seats }}
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <div class="ml-3">
                            <h5 class="font-bold">
                                Kaina: {{ $route->price }} eur
                            </h5>
                        </div>
                    </div>
                    @if(Auth::check() && Auth::user()->role == "0")
                    <div class="hidden lg:block">
                        <a href="/tickets/{{$route->id}}"
                           class="transition-colors duration-300 text-xs font-semibold bg-red-500 hover:bg-red-600 rounded-full py-2 px-8"
                        >Atsisisakyti</a>
                    </div>
                    @endif
                </footer>
            </div>
        </div>
    </article>
@endforeach
