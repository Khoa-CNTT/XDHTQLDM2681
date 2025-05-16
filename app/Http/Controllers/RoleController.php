<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Admin.page.Role.index', compact('roles'));
    }

    public function create()
    {
        return view('Admin.page.Role.create');
    }

    public function store(CreateRoleRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('Admin.page.Role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
    public function show($id)
    {
        // Nếu không cần show, có thể redirect hoặc return 404
        return redirect()->route('roles.index');
    }
}
