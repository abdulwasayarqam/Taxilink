<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index()
    {
        $associationData = Association::all();
        return view('association.index',compact('associationData'));
    }

    public function store( Request $request)
    {
        $association = new Association();
        $association->name = $request->name ;
        $association->association_code  = $request->association_code ;
        $association->type  = $request->type ;
        $association->address = $request->address ;
        $association->city  = $request->city ;
        $association->province= $request-> province;
        $association->executive_committee= $request-> executive_committee;
        $association->admin_staff = $request->admin_staff ;
        $association->operation_staff = $request->operation_staff ;
        $association->routes = $request->routes ;
        $association->save();

        return redirect()->back()->with('success','Data save Successfully...');
    }

    public function update(Request $request, $id)
    {
        $association = Association::find($id);
        $association->name = $request->name ;
        $association->association_code  = $request->association_code ;
        $association->type  = $request->type ;
        $association->address = $request->address ;
        $association->city  = $request->city ;
        $association->province= $request-> province;
        $association->executive_committee= $request-> executive_committee;
        $association->admin_staff = $request->admin_staff ;
        $association->operation_staff = $request->operation_staff ;
        $association->routes = $request->routes ;
        $association->update();

        return redirect()->back()->with('success','Data save Successfully...');
    }
    public function delete($id)
    {
        $association_delete = Association::find($id);
        if($association_delete){
            $association_delete->delete();
        }

        return redirect()->back()->with('success','Data Deleted Successfully...');

    }

}
