@props(['routes'])

@foreach ($routes as $route)
    @if(isset($oldroute) && $oldroute->from == $route->from && $oldroute->to == $route->to)
    @else
    @if(isset($oldroute))
    <div class=" px-5 lg:flex">
        <div class="text-sm mt-2 space-y-4">
            <span class="text-blue-500">Viso uždirbta: </span>{{ $totalMoney }} eur
            <span class="text-blue-500">Užimtumas: </span>{{ round(($totalSold) / $totalTickets*100, 2) }} %
        </div>
    </div>
    @endif
    <div class="mt-4">
        <h1 class="text-3xl">
            {{ $route->from }} - {{ $route->to }}
        </h1>
    </div>
    @php
    $oldroute=$route;
    $totalMoney=0;
    $totalTickets=0;
    $totalSold=0;
    $currentTime=\Carbon\Carbon::now();
    @endphp
    @endif
    <article
        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="py-6 px-5 lg:flex">
                <div class="text-sm mt-2 space-y-4">
                    <span class="text-blue-500">Reisas: </span><time>{{ $route->leaveAt }}</time> --> <time>{{ $route->arriveAt }}</time>
                    <span class="text-blue-500">Autobusas: </span>{{ $route->license_plate }}
                    <span class="text-blue-500">Bilieto kaina: </span>{{ $route->price }} eur
                    <span class="text-blue-500">Parduota bilietų: </span>{{ $route->busseats - $route->seats }}
                    <span class="text-blue-500">Uždirbta: </span>{{ ($route->busseats - $route->seats) * $route->price }} eur
                    <span class="text-blue-500">Užimtumas: </span>{{ round(($route->busseats - $route->seats) / $route->busseats*100, 2) }} %
                    @if ($currentTime < $route->leaveAt)
                    <span class="text-green-500">Būsimas</span>
                    @elseif($currentTime < $route->arriveAt)
                    <span class="text-yellow-500">Vykdomas</span>
                    @else
                    <span class="text-red-500">Baigtas</span>
                    @endif
                </div>
        </div>
    </article>
    @php
        $totalMoney = $totalMoney +  ($route->busseats - $route->seats) * $route->price;
        $totalTickets = $totalTickets + $route->busseats;
        $totalSold = $totalSold + $route->busseats - $route->seats;
    @endphp
@endforeach
