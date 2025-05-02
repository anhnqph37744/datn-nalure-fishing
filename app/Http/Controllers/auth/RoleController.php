<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.pages.role.list', compact('roles'));
    }

    public function create()
    {
        return view('admin.pages.role.create');
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->validated());
        return redirect()->route('admin.role.index')->with('success', 'Role added successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.pages.role.update', compact('role'));
    }

    public function update(Request $request,  $id)
    {
        $role = Role::find($id);
        $role->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]));
        return redirect()->route('admin.role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.role.index')->with('success', 'Role deleted successfully.');
    }
}
