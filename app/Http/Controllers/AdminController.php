<?php

namespace App\Http\Controllers;


use App\Models\Route;
use App\Models\Order;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.route.index', [
            'routes' => Route::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.route.create');
    }

    public function store()
    {
        $attributes = $this->validateRoute();
        $bus = \App\Models\Bus::find($attributes['bus_id']);
        Route::create(array_merge($this->validateRoute(), [
            'seats' => $bus->busseats,
        ]));

        return redirect('/admin/routes');
    }

    public function edit(Route $route)
    {
        $count = Order::where('route_id',$route->id)->count();

        if($count > 0){
            return back()->with('failure', 'Yra parduotų bilietų šiam reisui!');
        }
        else{
        return view('admin.route.edit', ['route' => $route]);
        }
    }

    public function update(Route $route)
    {
        $attributes = $this->validateRoute($route);

        $route->update($attributes);

        return redirect('/admin/routes')->with('success', 'Reisas atnaujintas!');
    }

    public function destroy(Route $route)
    {

        $count = Order::where('route_id',$route->id)->count();

        if($count > 0){
            return back()->with('failure', 'Yra parduotų bilietų šiam reisui!');
        }
        else{
            $route->delete();
            return back()->with('success', 'Reisas panaikintas!');
        }
    }


    protected function validateRoute(?Route $route = null): array
    {
        $route ??= new Route();
        $todayDate = Carbon::now();

        return request()->validate([
            'from' => 'required',
            'to' => 'required',
            'leaveAt' => 'required | date_format:Y-m-d H:i|after_or_equal:'.$todayDate,
            'arriveAt' => 'required | date_format:Y-m-d H:i|after:leave at',
            'price' => 'required | numeric | min:0 | not_in:0',
            'bus_id' => 'required',
        ]);
    }
}
