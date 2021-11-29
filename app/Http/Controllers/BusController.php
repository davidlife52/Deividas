<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Validation\Rule;

class BusController extends Controller
{
    public function index()
    {
        return view('admin.bus.index', [
            'buses' => Bus::paginate(50)
        ]);
    }
    public function create()
    {
        return view('admin.bus.create');
    }

    public function store()
    {
        Bus::create($this->validateBus());
        return redirect('/admin/buses');
    }
    public function edit(Bus $bus)
    {
        return view('admin.bus.edit', ['bus' => $bus]);
    }

    public function update(Bus $bus)
    {
        $attributes =  request()->validate([
            'license_plate' => 'required | unique:buses,license_plate,'.$bus->id,
            'comment' => 'nullable'
        ],[
            'unique' => 'Autobusas tokiais valstybiniais numeriais jau yra sukurtas'
        ]);

        $bus->update($attributes);


        return redirect('/admin/buses')->with('success', 'Autobusas atnaujintas!');
    }

    public function destroy(Bus $bus)
    {
        $count = Route::where('bus_id',$bus->id)->count();

        if($count > 0){
            return back()->with('failure', 'Autobusas naudojamas!');
        }
        else{
            $bus->delete();
            return back()->with('success', 'Autobusas panaikintas!');
        }
    }

    protected function validateBus(?Bus $bus = null): array
    {
        $bus ??= new Bus();

        return request()->validate([
            'busseats' => 'required | integer | min:0 | not_in:0',
            'license_plate' => 'required | unique:buses,license_plate',
            'comment' => 'nullable',
        ],[
            'unique' => 'Autobusas tokiais valstybiniais numeriais jau yra sukurtas'
        ]);
    }
}
