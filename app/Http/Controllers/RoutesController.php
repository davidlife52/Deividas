<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now();
        return view('routes.index', [
            'routes' => Route::where('leaveAt','>=',$currentTime)->oldest('leaveAt')->filter(
                request(['from', 'to'])
            )->paginate(10)->withQueryString(),
            'currentSource' => Route::firstWhere('from', request('from')),
            'currentDestination' => Route::firstWhere('to', request('to')),
        ]);

    }

    public function show(Route $route)
    {
        $currentTime = Carbon::now();
        if ($route->leaveAt < $currentTime){
            abort(Response::HTTP_FORBIDDEN);
        }
        else{
        return view('routes.show', [
            'route' => $route
        ]);
        }
    }

    public function order(Route $route)
    {
        $seats = $route->seats;
        if($seats > 0){
        Order::create([
            'user_id' => request()->user()->id,
            'route_id' => $route->id,
        ]);
        $route->seats=$seats-1;
        $route->save();
        return redirect('/')->with('success', 'Bilietas nupirktas');
        }
        else{
            return back()->with('failure', 'Nebėra bilietų');
        }
    }
}
