<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class SignupController extends Controller
{
    //
    public function showSignUpForm()
    {
        return view('signup'); // Replace 'signup' with the actual name of your view file
    }
    public function submitSignUpForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
     
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role_id = 1; 
        $user->save();
    
        return redirect()->route('login')->with('success', 'Sign up successful! You can now log in.');
    }
    








}
