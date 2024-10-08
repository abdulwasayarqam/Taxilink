<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{



    public function index(){
        $users = User::all();
        return view('user.index',compact('users'));
    }




    public function store(Request $request){
        
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required|string|min:8',
            ]);
           
            // If validation passes, create the user

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = bcrypt($request->password);
            $user->save();

            // Redirect after successful creation with a success message
            return redirect()->route('user-list')->with('success', 'User created successfully');
        
    }




    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-list')->with('success', 'User deleted successfully');
    }





    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,  // Ensure unique email, ignoring the current user's email
            'role' => 'required',
            'password' => 'nullable|string|min:8',  // Password is optional during update, but must be min 8 characters if provided
        ]);
    
        // Update the user data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
    
        // Check if password is provided, and if so, hash it and update
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
    
        // Save the updated user details
        $user->save();
    
        // Redirect back to the user list with a success message
        return redirect()->route('user-list')->with('success', 'User updated successfully.');
    }
    
}
