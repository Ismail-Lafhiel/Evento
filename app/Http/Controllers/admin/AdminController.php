<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $eventCount = Event::count();
        $approvedEventCount = Reservation::where('status', 'approved')->count();
        $deniedEventCount = Reservation::where('status', 'denied')->count();

        return view("admin.index", compact('userCount', 'eventCount', 'approvedEventCount', 'deniedEventCount'));
    }
}
