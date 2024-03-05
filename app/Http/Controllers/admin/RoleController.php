<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view("admin.roles.index", compact("roles"));
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        $role = Role::create($validated);
        return redirect()->route('admin.roles.index')->with("success", "{$role->name} is created successfuly");
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($role->id);
        return view("admin.roles.edit", compact("role", "permissions"));
    }
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(["name" => 'required|min:3']);
        $role = Role::findOrFail($role->id);
        $role->update($validated);
        return redirect()->route('admin.roles.index')->with('success', "{$role->name} is updated successfuly");
    }
    public function destroy(Request $request)
    {
        try {
            $role = Role::findOrFail($request->id);
            $role->delete();

            session()->flash('success', "{$role->name} is deleted successfully");

            return response()->json(['success' => true, 'message' => "{$role->name} deleted successfully"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function attachPermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permissions)) {
            return back()->with('message', "Permission exists");
        }

        $role->givePermissionTo($request->permissions);
        return redirect()->back()->with("success", "Permission added successfully");
    }
    public function detachPermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            session()->flash('success', "Permission revoked successfully");
            return response()->json(['success' => true, 'message' => "Permission revoked successfully"]);
        }
        session()->flash('error', "Permission doesn't exist");
        return response()->json(['success' => false, 'message' => "Permission doesn't exist"]);
    }
}
