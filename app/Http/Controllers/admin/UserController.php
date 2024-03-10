<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function profileInfo()
    {
        $user = auth()->user();

        $user->load('reservations.event');
        $user->load('events');

        $numberOfEvents = $user->events->count();

        $numberOfApplications = $user->events->sum(function ($event) {
            return $event->reservations->count();
        });

        $numberOfBookedEvents = $user->reservations->count();

        $numberOfApprovedBookings = $user->reservations->where('status', 'approved')->count();

        $numberOfDeniedBookings = $user->reservations->where('status', 'denied')->count();

        $approvedEvents = $user->events->where('status', 'approved')->count();
        $deniedEvents = $user->events->where('status', 'denied')->count();

        return view('profile', compact(
            'user',
            'numberOfEvents',
            'numberOfApplications',
            'numberOfBookedEvents',
            'numberOfApprovedBookings',
            'numberOfDeniedBookings',
            'approvedEvents',
            'deniedEvents'
        ));
    }
    public function userReservations()
    {
        $userId = Auth::id();

        $reservations = Reservation::where('user_id', $userId)
            ->where('status', 'approved')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reservations.index', compact('reservations'));
    }
}
