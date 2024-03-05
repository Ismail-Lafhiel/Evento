<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view("admin.permissions.index", compact("permissions"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        $permission = Permission::create($validated);
        return redirect()->route('admin.permissions.index')->with("success", "{$permission->name} is created successfuly");
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        $permission = Permission::findOrFail($permission->id);
        return view("admin.permissions.edit", compact("permission", "roles"));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(["name" => 'required|min:3']);
        $permission = Permission::findOrFail($permission->id);
        $permission->update($validated);
        return redirect()->route('admin.permissions.index')->with('success', "{$permission->name} is updated successfuly");
    }
    public function destroy(Request $request)
    {
        try {
            $permission = Permission::findOrFail($request->id);
            $permission->delete();

            session()->flash('success', "{$permission->name} is deleted successfully");

            return response()->json(['success' => true, 'message' => "{$permission->name} deleted successfully"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function attachRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->roles)) {
            return redirect()->back()->with('message', 'Role already exists');
        }
        $permission->assignRole($request->roles);
        return redirect()->back()->with('success', 'Role assigned successfully');
    }
    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            session()->flash('success', "Role revoked successfully");

            return response()->json(['success' => 'Role revoked successfully']);
        }
        session()->flash('error', "Role doesn't exists");
        return response()->json(['error' => "Role doesn't exists"]);

    }
}
