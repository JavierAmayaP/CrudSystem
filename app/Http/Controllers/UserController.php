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
        $users = User::orderBy('id')->get();
        
        // view recive two params ('name of view, [$data])
        return view('users.index',[
            'users' => $users
        ]);
    }
    
    // Save user information into database
    public function store(Request $request)
    {
        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
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
