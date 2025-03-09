<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

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

    public function update(RoleRequest $request,  $id)
    {
        $role = Role::find($id);
        $role->update($request->validated());
        return redirect()->route('admin.role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.role.index')->with('success', 'Role deleted successfully.');
    }
}
