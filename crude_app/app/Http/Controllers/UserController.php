<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

public function create()
{
    return view('users.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'contact_number' => 'required',
        'gender' => 'required',
    ]);

    User::create($validatedData);

    return redirect()->route('users.index')->with('success', 'User created successfully');
}

public function show(User $user)
{
    return view('users.show', compact('user'));
}

public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'contact_number' => 'required',
        'gender' => 'required',
    ]);

    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}

public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}
}
