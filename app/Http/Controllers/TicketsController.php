<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketsController extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now();
        $id = request()->user()->id;
        $routes = DB::table('routes')->join('orders', 'routes.id', '=', 'orders.route_id')->where('orders.user_id', $id)->where('arriveAt','>=',$currentTime)->oldest('leaveAt');
        return view('tickets.index', [
            'routes' => $routes->paginate(18),
        ]);

    }

    public function show($id)
    {
        $currentTime = Carbon::now();
        $order = Order::where('id',$id)->first();
        //$order = Order::all()->where('user_id', request()->user()->id)->where('route_id', $id)->count();
        if(!$order || $order->user_id != request()->user()->id){
            abort(Response::HTTP_FORBIDDEN);
        }
        else{
            $route = Route::where('id', $order->route_id)->first();
            if($route->arriveAt < $currentTime){
                abort(Response::HTTP_FORBIDDEN);
            }
            else{
                return view('tickets.show', [
                    'route' => $route,
                    'order_id' => $id,
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if($order){
            $route = Route::where('id', $order->route_id)->first();
            $seats = $route->seats;
            $route->seats=$seats+1;
            $route->save();
            $order->delete();
        }


        return redirect('/tickets')->with('success', 'Bilietas atšauktas!');
    }

}
