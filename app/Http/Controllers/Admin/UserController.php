<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('Admin.page.User.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('Admin.page.User.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_ids' => 'array'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'PhoneNumber' => $request->PhoneNumber,
            'Address' => $request->Address,
        ]);

        $user->roles()->sync($request->role_ids);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('Admin.page.User.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_ids' => 'array'
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'PhoneNumber' => $request->PhoneNumber,
            'Address' => $request->Address,
        ]);

        $user->roles()->sync($request->role_ids);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
    public function show($id)
    {
        // Nếu không cần show, có thể redirect hoặc return 404
        return redirect()->route('roles.index');
    }
}
