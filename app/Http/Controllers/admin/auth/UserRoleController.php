<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {

        $userRoles = UserRole::with(['user', 'role'])->get();

        return view('admin.pages.authorize.list', compact('userRoles'));
    }
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.pages.authorize.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        UserRole::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Vai trò đã được gán cho tài khoản!');
    }

    public function destroy($id)
    {
        UserRole::findOrFail($id)->delete();
        return redirect()->route('admin.user-role.index')->with('success', 'Đã xóa vai trò của tài khoản!');
    }
    public function edit($id)
    {

        $users = User::all();
        $roles = Role::all();
        $obj =  UserRole::findOrFail($id);
        return view('admin.pages.authorize.update', compact('obj', 'users', 'roles'));
    }
    public function update(Request $request, $id)

    {
        $obj =  UserRole::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $obj->update([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Vai trò đã được gán cho tài khoản!');
    }
}
