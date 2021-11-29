<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Atgal
                    </a>

                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $route->from }} - {{ $route->to }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    Išvyksta: <time>{{ $route->leaveAt }}</time><br/>
                    Atvyksta: <time>{{ $route->arriveAt }}</time>
                </div>

                <div class="mt-6 font-bold space-y-8 lg:text-lg leading-loose">
                    Laisvų vietų skaičius: {{$route->seats}}
                </div>


                <form method="POST" action="/tickets/{{$order_id}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <x-form.button color='red'>Atsisakyti</x-form.button>
                </form>

            </div>
        </article>
    </main>
</x-layout>
