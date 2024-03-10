<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::whereNotIn('status', ['denied', 'pending'])
            ->orderBy("created_at", "desc")
            ->paginate(3);
        return view('home', compact("events"));
    }

    public function company()
    {
        return view('company');
    }

    public function events()
    {
        $categories = Category::get();
        $events = Event::whereNotIn('status', ['denied', 'pending'])
            ->orderBy("created_at", "desc")
            ->paginate(10);
        return view('events', compact("events", "categories"));
    }
    public function event($id)
    {
        $event = Event::findOrFail($id);

        if ($event->status === 'denied' || $event->status === 'pending') {
            return abort(404, 'Event does not exist');
        }

        return view('event', compact('event'));
    }
    public function contact()
    {
        return view('contact');
    }

    // search events 
    public function search(Request $request)
    {
        $name = $request->input('name');
        $category = $request->input('category');

        $query = Event::query();

        if ($name) {
            $query->where('title', 'like', "%$name%");
        }

        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('category_name', $category);
            });
        }

        $results = $query->get();

        return response()->json($results);
    }
}
