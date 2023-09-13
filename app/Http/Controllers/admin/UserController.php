<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    public function create()
    {
        $roles = Role::all(); // Fetch all roles
        return view('admin.users.create', compact('roles'));
    }
    
    
    
    public function store(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'role_id' => 'required|exists:roles,id', // Validate the role_id field
    ]);

    // Create a new user
    $user = new User;
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);
    $user->role_id = $validatedData['role_id']; // Assign the role_id

    $user->save();

    // Redirect to a success page or show a success message
    return redirect()->route('admin.users.index')->with('success', 'تم إنشاء حساب بنجاح');
}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Fetch all roles
        return view('admin.users.edit', compact('user', 'roles'));
    }
    
    public function update(Request $request, $id)
{
    // Validate the input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
        'role_id' => 'required|exists:roles,id', // Validate the role_id field
    ]);

    // Find the user and update the information
    $user = User::findOrFail($id);
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->role_id = $validatedData['role_id']; // Update the role_id

    if ($validatedData['password']) {
        $user->password = bcrypt($validatedData['password']);
    }

    $user->save();

    // Redirect to a success page or show a success message
    return redirect()->route('admin.users.index')->with('success', 'تم تحديث حساب بنجاح');
}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        // Redirect to a success page or show a success message
        return redirect()->route('admin.users.index')->with('success', 'تم حذف حساب بنجاح');
    }
        
}
