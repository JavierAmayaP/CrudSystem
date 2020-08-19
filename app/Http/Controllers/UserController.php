<?php

namespace App\Http\Controllers;

use App\User;
// Clase que representa una solicitud http
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show user information 
    public function index()
    {
        // lok for all user data into database
        $users = User::orderBy('id','desc')->get();
        
        // view recive two params ('name of view, [$data])
        return view('users.index',[
            'users' => $users
        ]);
    }
    
    // Save user information into database
    public function store(Request $request)
    {
        // create validation for the request
        $request->validate([
            'name' => 'required',
            // Unique:users look for the email in user table verifing if this one is unique.
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // back() allowed me to return information to the last route
        return back();
    }

    // delete user information selected
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
