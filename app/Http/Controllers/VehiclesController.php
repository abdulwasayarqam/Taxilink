<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index()
    {
        $associations = Association::all();
        $vehicles = Vehicles::all();
        return view('vehicles.index',compact('vehicles','associations'));
    }
    public function store( Request $request)
    {
        $vehicles = new Vehicles();
        $vehicles->association_id = $request->association_id ;
        $vehicles->vehicle_id = $request->vehicle_id ;
        $vehicles->owner_name = $request->owner_name ;
        $vehicles->make = $request->make ;
        $vehicles->model = $request->model ;
        $vehicles->color = $request->color ;
        $vehicles->number_plate = $request->number_plate ;
        $vehicles->vin_number = $request->vin_number ;
        $vehicles->engine_number = $request->engine_number ;
        $vehicles->license_disc_expiry = $request->license_disc_expiry ;
        $vehicles->operator_license_expiry = $request->operator_license_expiry ;
        $vehicles->linked_associations = $request->linked_associations ;
        $vehicles->save();

        return redirect()->back()->with('success','Vehicle added successfully...');
    }
    public function delete($id)
    {
        $vehiclesDelete = Vehicles::find($id);
        if($vehiclesDelete){
            $vehiclesDelete->delete();
        }
        return redirect()->back()->with('success','Vehicle delete successfully...');
    }

    public function update( Request $request, $id)
    {
        $vehicles = Vehicles::find($id);
        $vehicles->vehicle_id = $request->vehicle_id ;
        $vehicles->owner_name = $request->owner_name ;
        $vehicles->make = $request->make ;
        $vehicles->model = $request->model ;
        $vehicles->color = $request->color ;
        $vehicles->number_plate = $request->number_plate ;
        $vehicles->vin_number = $request->vin_number ;
        $vehicles->engine_number = $request->engine_number ;
        $vehicles->license_disc_expiry = $request->license_disc_expiry ;
        $vehicles->operator_license_expiry = $request->operator_license_expiry ;
        $vehicles->linked_associations = $request->linked_associations ;
        $vehicles->update();

        return redirect()->back()->with('success','Vehicle update successfully...');
    }

}
