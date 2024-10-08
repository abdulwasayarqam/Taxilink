<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $employeeData = Employee::all();
        return view('employee.index',compact('users','employeeData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->user_id = $request->user_id;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->known_as = $request->known_as;
        $employee->id_number = $request->id_number;
        $employee->primary_phone = $request->primary_phone;
        $employee->secondary_phone = $request->secondary_phone;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->next_of_kin = $request->next_of_kin;
        $employee->next_of_kin_phone = $request->next_of_kin_phone;
        $employee->role = $request->role;


        $employee->license_number = $request->license_number;
        $employee->license_first_issue = $request->license_first_issue;
        $employee->license_code = $request->license_code;
        $employee->license_expiry = $request->license_expiry;
        $employee->pdpr_first_issue = $request->pdpr_first_issue;
        $employee->pdpr_expiry = $request->pdpr_expiry;
        $employee->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee,$id)
    {
        {
            $employee =  Employee::find($id);
            $employee->user_id = $request->user_id;
            $employee->first_name = $request->first_name;
            $employee->middle_name = $request->middle_name;
            $employee->last_name = $request->last_name;
            $employee->known_as = $request->known_as;
            $employee->id_number = $request->id_number;
            $employee->primary_phone = $request->primary_phone;
            $employee->secondary_phone = $request->secondary_phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->next_of_kin = $request->next_of_kin;
            $employee->next_of_kin_phone = $request->next_of_kin_phone;
            $employee->role = $request->role;


            $employee->license_number = $request->license_number;
            $employee->license_first_issue = $request->license_first_issue;
            $employee->license_code = $request->license_code;
            $employee->license_expiry = $request->license_expiry;
            $employee->pdpr_first_issue = $request->pdpr_first_issue;
            $employee->pdpr_expiry = $request->pdpr_expiry;
            $employee->update();

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Employee $employee, $id)
    {

        $employeeDelete = Employee::find($id);
        if($employeeDelete){
            $employeeDelete->delete();
        }

        return redirect()->back();
    }
}
