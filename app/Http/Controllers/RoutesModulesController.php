<?php

namespace App\Http\Controllers;

use App\Models\RoutesModules;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class RoutesModulesController extends Controller
{
    public function index()
    {
        $routeModules = RoutesModules::all();
     return view('routes-modules.index',compact('routeModules'));
    }
    public function store(Request $request)
    {
        $routesModules = new Vehicles();
        $routesModules->association_id = $request->association_id ;
        $routesModules->vehicle_id = $request->vehicle_id ;
        $routesModules->owner_name = $request->owner_name ;
        $routesModules->make = $request->make ;
        $routesModules->model = $request->model ;
        $routesModules->color = $request->color ;
        $routesModules->number_plate = $request->number_plate ;
        $routesModules->vin_number = $request->vin_number ;
        $routesModules->engine_number = $request->engine_number ;

        $routesModules->save();

        return redirect()->back()->with('success','Vehicle added successfully...');
    }
    public function update(Request $request, $id)
    {

    }
    public function delete()
    {

    }
}
