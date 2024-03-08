<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return redirect()->back()->with("error", "Role does't exist");
        }

        $user->assignRole($request->role);
        return redirect()->back()->with("success", "Role assigned successfully");
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            if (!$user->hasRole("admin")) {
                session()->flash("message", "You are admin");
                return response()->json(['success' => false, 'message' => "You are admin"]);
            }
            $user->removeRole($role);
            session()->flash('success', "Role removed successfully");
            return response()->json(['success' => true, 'message' => "Role removed successfully"]);
        }
        session()->flash('error', "Role doesn't exist");
        return response()->json(['success' => true, 'message' => "Role doesn't exist"]);
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return redirect()->back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return redirect()->back()->with('success', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            session()->flash('success', "Permission revoked successfully");
            return response()->json(['success' => true, 'message' => "Permission revoked successfully"]);
        }
        session()->flash('error', "Permission does not exists");
        return response()->json(['success' => false, 'message' => "Permission does not exists"]);
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            session()->flash('error', "you are admin");
            return response()->json(['success' => false, 'message' => "you are admin"]);
        }
        $user->delete();
        session()->flash('success', "User deleted successfuly");
        return response()->json(['success' => true, 'message' => "User deleted successfuly"]);
    }
}
