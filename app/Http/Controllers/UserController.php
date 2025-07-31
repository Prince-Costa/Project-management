<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isAdmin()) {
            abort(404);
        }

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!isAdmin()) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        if (!isAdmin()) {
            abort(404);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'last_activity' => now(), 
        ]);

        // Optionally, you can redirect or return a response after creating the user
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Optionally, you can redirect or return a response after updating the user
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $user = User::with('work')->findOrFail($id);
   
        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!isAdmin()) {
            abort(404);
        }

        $user = User::findOrFail($id);
        $user->delete();

        // Optionally, you can redirect or return a response after deleting the user
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
