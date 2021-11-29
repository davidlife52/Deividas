<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    public function index()
    {
        //$routes = Route::orderby('from')->orderby('to')->orderby('leaveAt', 'asc')->get();
        $routes = DB::table('routes')->join('buses', 'routes.bus_id', '=', 'buses.id')->orderby('from')->orderby('to')->orderby('leaveAt', 'asc')->get();

        return view('business.index', [
            'routes' => $routes,
            'oldfrom' => Null,
            'oldto' => Null,
        ]);
    }
}
