<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view(
            'admin.pages.permistion.list',
            compact('permissions')
        );
    }

    public function create()
    {
        return view('admin.pages.permistion.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create($request->validated());
        return redirect()->route('admin.permission.index')->with('success', 'Permission added successfully.');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.pages.permistion.update', compact('permission'));
    }

    public function update(PermissionRequest $request,  $id)
    {
        $permission = Permission::find($id);
        $permission->update($request->validated());
        return redirect()->route('admin.permission.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        $permission->delete();
        return redirect()->route('admin.permission.index')->with('success', 'Permission deleted successfully.');
    }
}
