<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {

        $rolePermissions = RolePermission::with(['role', 'permission'])->get();

        return view('admin.pages.authorization.list', compact('rolePermissions'));
    }
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.pages.authorization.create', compact('roles', 'permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);

        RolePermission::create([
            'role_id' => $request->role_id,
            'permission_id' => $request->permission_id,
        ]);

        return redirect()->route('admin.perrmission-role.index')->with('success', 'Quyền đã được gán cho vai trò!');
    }

    public function destroy($id)
    {
        RolePermission::findOrFail($id)->delete();
        return redirect()->route('admin.perrmission-role.index')->with('success', 'Đã xóa quyền khỏi vai trò!');
    }
}
